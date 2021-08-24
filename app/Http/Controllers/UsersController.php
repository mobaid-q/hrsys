<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\Req_emp;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        $uid = session()->get('u_id');
        $data = User::where('id', $uid)->get();
        $info = Employee::join('tblemptype', 'tblemptype.et_id', '=', 'tblemp.et_id')
              ->join('tbldsg', 'tbldsg.dg_id', '=', 'tblemp.dg_id')
              ->join('tbldep', 'tbldep.d_id', '=', 'tblemp.d_id')
              ->join('tblbranch', 'tblbranch.br_id', '=', 'tblemp.br_id')
              ->where('tblemp.e_id', $uid)
              ->get(['tblemp.*', 'tblemptype.et_title', 'tbldsg.dg_title', 'tbldep.d_name', 'tblbranch.br_name']);
        return view('user.index', ['data' => $data, 'info' => $info]);
    }

    public function attend() {
        $uid = session()->get('u_id');
        $data = DB::table('tblattend')->where('e_id', $uid)->get();
        return view('user.attend.att', ['data' => $data]);
    }

    public function docs() {
        $uid = session()->get('u_id');
        $data = DB::table('tbledocs')->where('e_id', $uid)->get();
        return view('user.docs.doc', ['data' => $data]);
    }

    public function docs_dl($u_file) {
        $uid = session()->get('u_id');
        // $upl = public_path()."/edocs/".$uid."/".$u_file;
        $upl = storage_path('app/docs/').$uid."/".$u_file;
        // $headers = array('Content-Type: application/docx',);
        // return response()->download($upl, $u_file, $headers);
        return response()->download($upl, $u_file);
    }

    public function leaves() {
        $uid = session()->get('u_id');
        $quo_emp = Leave::join('tblquolev', 'tblquolev.lq_id', '=', 'tblleaves.lq_id')
            ->where('tblleaves.e_id', $uid)
            ->get(['tblleaves.*', 'tblquolev.lq_title']);
        return view('user.leaves.lev', ['quo_emp' => $quo_emp]);
    }

    public function quota() {
        $uid = session()->get('u_id');
        $data = DB::table('tblquolev')->where('e_id', $uid)->get();
        return view('user.leaves.quo', ['data' => $data]);
    }

    public function apply_lev() {
        $uid = session()->get('u_id');
        $data = DB::table('tblquolev')->where('e_id', $uid)->get();
        $emp = Employee::all();
        return view('user.leaves.apply', ['data' => $data, 'emp' => $emp]);
    }

    public function get_rem_lev(Request $req) {
        $quo = $req->quo;
        $data = DB::table('tblquolev')->select('lq_pending')->where('lq_id', $quo)->get();
        return $data[0]->lq_pending;
    }

    public function sav_lev(Request $req) {
        $lev = new Leave;
        $lev->lq_id  = $req->ilq_id;
        $lev->l_qty  = $req->il_qty;
        $lev->l_sdate  = date_format(date_create($req->il_sdate), 'Y-m-d');
        $lev->l_edate  = date_format(date_create($req->il_edate), 'Y-m-d');
        $lev->l_details  = $req->il_details;
        $lev->l_ephone  = $req->il_ephone;
        $lev->l_alter_eid  = $req->il_alter_eid;
        $lev->e_id  = session()->get('u_id');
        $lev->save();
        return redirect('/user/leaves');
    }

    public function sal() {
        $uid = session()->get('u_id');
        $data = DB::table('tblempsal')->where('e_id', $uid)->whereNull('es_end')->get();
        return view('user.sal.sal', ['data' => $data]);
    }

    public function pay() {
        $uid = session()->get('u_id');
        $data = DB::table('tblpayments')->where('e_id', $uid)->get();
        return view('user.sal.paid', ['data' => $data]);
    }

    public function pwd() {
        // $uid = session()->get('u_id');
        // $data = DB::table('tblpayments')->where('e_id', $uid)->get();
        return view('user.pwd.pwd');
    }

    public function ch_pwd(Request $req) {
        $uid = session()->get('u_id');
        $old_pwd = $req->io_pwd;
        $new_pwd = $req->i_pwd;
        $cfm_pwd = $req->ic_pwd;
        $usr = DB::table('users')->where('id', $uid)->get();
        if($old_pwd == $usr[0]->password) {
            if($new_pwd == $cfm_pwd) {
                $up_pwd = User::where('id', $uid)
                ->update([
                    'password' => $new_pwd
                    ]);
                return redirect('/logout');
            }
        }
        else {
            return redirect('/user/password');
        }
    }

    public function req() {
        $uid = session()->get('u_id');
        $data = Req_emp::where('e_id', $uid)->get();
        return view('user.req.req', ['data' => $data]);
    }

    public function new_req() {
        $uid = session()->get('u_id');
        $brn = Employee::select('br_id')->where('e_id', $uid)->get();
        $data = DB::table('tbldep')->where('br_id', $brn[0]->br_id)->get();
        return view('user.req.new_req', ['data' => $data]);
    }
    
    public function sav_req(Request $req) {
        $uid = session()->get('u_id');
        $r_emp = new Req_emp;
        $r_emp->req_title = $req->ireq_title;
        $r_emp->req_desc = $req->ireq_desc;
        $r_emp->d_id = $req->id_id;
        $r_emp->e_id = $uid;
        $r_emp->save();
        return redirect('/user/requests');
    }


}
