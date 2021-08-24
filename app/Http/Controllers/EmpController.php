<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use App\Http\Traits\Create_User;
// use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class EmpController extends Controller
{
    use Create_User;
    
    public function index() {
        // $data = Employee::all();
        $data = Employee::join('tblemptype', 'tblemptype.et_id', '=', 'tblemp.et_id')
              ->join('tbldsg', 'tbldsg.dg_id', '=', 'tblemp.dg_id')
              ->join('tbldep', 'tbldep.d_id', '=', 'tblemp.d_id')
              ->join('tblbranch', 'tblbranch.br_id', '=', 'tblemp.br_id')
              ->get(['tblemp.*', 'tblemptype.et_title', 'tbldsg.dg_title', 'tbldep.d_name', 'tblbranch.br_name']);
        return view('emp.index', ['data' => $data]);
    }

    public function add_emp() {
        $br = DB::select('select * from tblbranch');
        $type = DB::select('select * from tblemptype');
        $dsg = DB::select('select * from tbldsg');
        $dep = DB::select('select * from tbldep');
        return view('emp.add_emp', ['br'=>$br, 'type'=>$type, 'dsg'=>$dsg, 'dep'=>$dep]);
    }

    public function get_brxdept(Request $req) {
        $bid = $req->bid;
        $res = DB::table('tbldep')->where('br_id', $bid)->get();
        foreach($res as $item) {
            print("<option value=$item->d_id>$item->d_name</option>");
        }
    }

    public function sav_emp(Request $req) {
        $emp = new Employee;
        $data = $req->input();
        $req->validate(['ie_image' => 'required|image|mimes:jpeg,png,jpg|max:500']);
        // $req->validate(['ie_image' => 'required|image|mimes:jpeg,png,jpg|max:500|dimensions:max_width=350,max_height=350']);
        $emp->e_fname = $data['ie_fname'];
        $emp->e_lname = $data['ie_lname'];
        $emp->e_dob = date_format(date_create($data['ie_dob']), "Y-m-d");
        $emp->e_addr = $data['ie_addr'];
        $emp->e_city = $data['ie_city'];
        $emp->e_cntry = $data['ie_cntry'];
        
        $img_file = $req->file('ie_image');
        $ext = $img_file->extension();
        $img_name = time().".".$ext;
        $emp->e_image = $img_name;
        $emp->e_phone = $data['ie_phone'];
        $emp->e_email = $data['ie_email'];
        $emp->e_hiredate = date_format(date_create($data['ie_hiredate']), "Y-m-d");
        $emp->et_id = $data['iet_id'];
        $emp->dg_id = $data['idg_id'];
        $emp->d_id = $data['id_id'];
        $emp->br_id = $data['ibr_id'];
        $emp->save();
        $last_ins = $emp->id;
        $this->cr_usr($last_ins, $data['ie_fname'], $data['ie_lname'], 0);
        $img_name = $last_ins.'-'.$img_name;
        Storage::disk('emp_img')->put($img_name, File::get($img_file));
        // $img_file->move(public_path('/emp_img'), $img_name);
        Employee::where('e_id', '=', $last_ins)->update(array('e_image' => $img_name));
        $req->session()->flash('admsg','Employee added successfully.');
        return redirect('/add_employee');
    }

    public function ed_emp($eid) {
        $data = Employee::where('e_id', $eid)->get();
        $br = DB::select('select * from tblbranch');
        $type = DB::select('select * from tblemptype');
        $dsg = DB::select('select * from tbldsg');
        $dep = DB::select('select * from tbldep');
        $sel_br = Employee::join('tblbranch', 'tblbranch.br_id', '=', 'tblemp.br_id')
                ->where('tblemp.e_id', '=', $eid)
                ->get(['tblbranch.br_id', 'tblbranch.br_name']);
        $sel_dep = Employee::join('tbldep', 'tbldep.d_id', '=', 'tblemp.d_id')
                ->where('tblemp.e_id', '=', $eid)
                ->get(['tbldep.d_id', 'tbldep.d_name']);
        return view('emp.ed_emp', ['data'=> $data, 'br'=>$br, 'type'=>$type, 'dep'=>$dep, 'dsg'=>$dsg, 'sel_br'=>$sel_br, 'sel_dep'=>$sel_dep]);
    }

    public function upd_emp(Request $req) {
        $req->validate(['ie_image' => 'image|mimes:jpeg,png,jpg|max:500']);
        $data = $req->input();
        $eid = $data['ie_id'];
        if($req->hasfile('ie_image')) {
            $file = $req->file('ie_image');
            $ext = $file->extension();
            $img_name = time().".".$ext;
            $img_name = $eid.'-'.$img_name;
            Storage::disk('emp_img')->put($img_name, File::get($file));
            // $file->move(public_path('/emp_img/'), $img_name);  
            // unlink(public_path('/emp_img/'.$data['iold_img']));
            unlink(storage_path('app/emp_img/'.$data['iold_img']));
        }
        if (!isset($img_name)) {
            $img_name = $data['iold_img'];
        }

        $emp = Employee::where('e_id', $eid)
                ->update([
                    'e_fname' => $data['ie_fname'],
                    'e_lname' => $data['ie_lname'],
                    'e_dob' => $data['ie_dob'],
                    'e_addr' => $data['ie_addr'],
                    'e_city' => $data['ie_city'],
                    'e_cntry' => $data['ie_cntry'],
                    'e_image' => $img_name,
                    'e_phone' => $data['ie_phone'],
                    'e_email' => $data['ie_email'],
                    'e_status' => $data['ie_status'],
                    'e_hiredate' => $data['ie_hiredate'],
                    'et_id' => $data['iet_id'],
                    'dg_id' => $data['idg_id'],
                    'd_id' => $data['id_id'],
                    'br_id' => $data['ibr_id'],
                    ]);
        if($emp == 1) {
            $req->session()->flash('edmsg','Employee updated successfully.');
        }
        else {
            $req->session()->flash('edmsg','Sorry, try again!');
        }
        return redirect('/employees');
    }

    public function del_emp($eid, Request $req) {
        $e_img = Employee::select('e_image')->where('e_id', $eid)->get();
        unlink(storage_path('app/emp_img/'.$e_img[0]->e_image));
        $delusr = DB::table('users')->where('id', $eid)->delete();
        $delrec = Employee::where('e_id', $eid)->delete();
        if($delrec > 0) {
            $req->session()->flash('delmsg','Employee deleted successfully.');
        }
        else {
            $req->session()->flash('delmsg','Sorry, try again!');
        }
        return redirect('/employees');
    }

}