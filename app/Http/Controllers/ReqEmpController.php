<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Req_emp;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReqEmpController extends Controller
{
    public function index() {
        $data = Req_emp::get();
        return view('requests.index', ['data' => $data]);
    }
    
    public function ed_req($rid) {
        $data = Req_emp::where('req_id', $rid)->get();
        $emp = DB::table('tblemp')->get();
        $brid = DB::table('tbldep')->select('br_id')->where('d_id', $data[0]->d_id)->get();
        $dep = DB::table('tbldep')->where('br_id', $brid[0]->br_id)->get();
        return view('requests.ed_req', ['data' => $data, 'emp' => $emp, 'dep' => $dep]);
    }

    public function sav_req(Request $req) {
        $data = $req->input();
        $up_req = Req_emp::where('req_id', $data['ireq_id'])
                ->update([
                    'e_id' => $data['ie_id'],
                    'req_title' => $data['ireq_title'],
                    'req_desc' => $data['ireq_desc'],
                    'req_status' => 'read',
                    'd_id' => $data['id_id'],
                    ]);
        if($up_req) {
            $req->session()->flash('edmsg','Request for employee updated successfully.');
        }
        else {
            $req->session()->flash('edmsg','Sorry! try again.');
        }
        return redirect('/requests');
    }

    public function status_req($rid) {
        $last_url = url()->previous();
        $status = DB::table('tblrequests')->select('req_status')->where('req_id', $rid)->get();
        if($status[0]->req_status == 'read') {
            Req_emp::where('req_id', $rid)->update(['req_status' => 'unread']);
        }
        else {
            Req_emp::where('req_id', $rid)->update(['req_status' => 'read']);
        }
        
        if(Str::contains($last_url, 'requests')) {
            return redirect('/requests');
        }
        else{
            return redirect('/');
        }
    }

    public function del_req($rid) {
        $last_url = url()->previous();
        $delrec = Req_emp::where('req_id', $rid)->delete();
        if($delrec) {
            session()->flash('delmsg','Request for employee deleted successfully.');
        }
        else {
            session()->flash('delmsg','Sorry! try again.');
        }
        
        if(Str::contains($last_url, 'requests')) {
            return redirect('/requests');
        }
        else{
            return redirect('/');
        }
    }


}
