<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Department;
use Illuminate\Support\Facades\Session;

class DepController extends Controller
{
    public function index() {
        // $data = DB::select('select * from tbldep');
        $data = Department::all();
        return view('dep.index', ['data' => $data]);
    }

    public function add_dep() {
        $data = DB::select('select br_id, br_name from tblbranch');
        return view('dep.add_dep', ['data'=> $data]);
    }

    public function sav_dep(Request $req) {
        $dept = new Department;
        $dept->d_name = $req->input('id_name');
        $dept->br_id = $req->input('ibr_id');
        $dept->d_details = $req->input('id_details');
        $dept->save();
        $req->session()->flash('admsg','Deapartment added successfully.');
        return redirect('/add_dept');
    }

    public function ed_dep($did) {
        $data = Department::where('d_id', $did)->get();
        $branch = DB::select("select * from tblbranch");
        return view('dep.ed_dep', ['data'=> $data, 'branch' => $branch]);
    }

    public function upd_dep(Request $req) {
        $data = $req->input();
        $dept = Department::where('d_id', $data['id_id'])
                ->update([
                    'd_name' => $data['id_name'],
                    'br_id' => $data['ibr_id'],
                    'd_details' => $data['id_details']
                    ]);
        if($dept == 1) {
            $req->session()->flash('edmsg','Department updated successfully.');
        }
        else {
            $req->session()->flash('edmsg','Sorry, try again!');
        }
        return redirect('/departments');
    }

    public function del_dep($did, Request $req) {
        $delrec = Department::where('d_id', $did)->delete();
        if($delrec > 0) {
            $req->session()->flash('delmsg','Department deleted successfully.');
        }
        else {
            $req->session()->flash('delmsg','Sorry, try again!');
        }
        return redirect('/departments');
    }

}
