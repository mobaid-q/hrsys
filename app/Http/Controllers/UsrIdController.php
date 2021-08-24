<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UsrIdController extends Controller
{
    public function index() {
        $data = User::all();
        return view('usr_id.index', ['data' => $data]);
    }

    public function add_ids() {
        $qry = "SELECT * from tblemp WHERE e_id NOT IN (SELECT id FROM users)";
        $emp = DB::select($qry);
        return view('usr_id.add_id', ['emp' => $emp]);
    }

    public function sav_ids(Request $req) {
        $usr = new User;
        $data = $req->input();
        $usr->id = $data['ie_id'];
        $usr->name = $data['iname'];
        $usr->email = $data['iemail'];
        $usr->password = $data['ipassword'];
        $usr->is_admin = $data['i_is_admin'];
        if($usr->save()) {
            $req->session()->flash('admsg','User added successfully.');
        }
        else {
            $req->session()->flash('admsg','Sorry! try again.');
        }
        return redirect('/ad_sys_usrs');
    }
    
    public function ed_ids($id) {
        $data = User::where('id', $id)->get();
        return view('usr_id.ed_id', ['data' => $data]);
    }

    public function upd_ids(Request $req) {
        $data = $req->input();
        $ed_usr = User::where('id', $data['i_id'])->update([
            'email' => $data['iemail'],
            'password' => $data['ipassword'],
            'is_admin' => $data['i_is_admin'],
        ]);
        if($ed_usr == 1) {
            $req->session()->flash('edmsg','User updated successfully.');
        }
        else {
            $req->session()->flash('edmsg','Sorry, try again!');
        }
        return redirect('/sys_usrs');
    }

    public function del_ids(Request $req, $id) {
        $delrec = User::where('id', $id)->delete();
        if($delrec > 0) {
            $req->session()->flash('delmsg','User deleted successfully.');
        }
        else {
            $req->session()->flash('delmsg','Sorry, try again!');
        }
        return redirect('/sys_usrs');
    }

}
