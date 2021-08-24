<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Leave;
use Illuminate\Support\Facades\Session;

class LeavesController extends Controller
{
    public function index() {
        $data = DB::select('select * from tblleaves');
        return view('lev.index', ['data' => $data]);
    }

    public function add_lev() {
        $data = DB::select("select * from tblemp");
        return view('lev.add_lev', ['data' => $data]);
    }

    public function get_emxlq(Request $req) {
        $eid = $req->eid;
        $res = DB::table('tblquolev')->where('e_id', $eid)->get();
        foreach($res as $item) {
            print("<option value=$item->lq_id>$item->lq_title</option>");
        }
    }

    public function sav_lev(Request $req) {
        $lev = new Leave;
        $lev->e_id = $req->input('ie_id');
        $lev->l_qty = $req->input('il_qty');
        $lev->l_sdate = $req->input('il_sdate');
        $lev->l_edate = $req->input('il_edate');
        $lev->l_details = $req->input('il_details');
        $lev->l_alter_eid = $req->input('il_alter_eid');
        $lev->l_ephone = $req->input('il_ephone');
        $lev->lq_id = $req->input('ilq_id');
        if($lev->save()) {
            $req->session()->flash('admsg','Leave added successfully.');
        }
        else {
            $req->session()->flash('admsg','Sorry, try again!');
        }
        return redirect('/add_leaves');
    }

    public function ed_lev($lid) {
        $data = Leave::where('l_id', $lid)->get();
        $emp = DB::table('tblemp')->get();
        $sel_quo = Leave::join('tblquolev', 'tblquolev.lq_id', '=', 'tblleaves.lq_id')
                ->where('tblleaves.l_id', '=', $lid)
                ->get(['tblleaves.lq_id', 'tblquolev.lq_title']);
        return view('lev.ed_lev', ['data'=> $data, 'emp' => $emp, 'sel_quo' => $sel_quo]);
    }

    public function upd_lev(Request $req) {
        $data = $req->input();
        $lev = Leave::where('l_id', $data['il_id'])
                ->update([
                    'l_qty' => $data['il_qty'],
                    'l_sdate' => $data['il_sdate'],
                    'l_edate' => $data['il_edate'],
                    'l_details' => $data['il_details'],
                    'l_alter_eid' => $data['il_alter_eid'],
                    'l_ephone' => $data['il_ephone'],
                    'e_id' => $data['ie_id'],
                    'lq_id' => $data['ilq_id']
                    ]);
        if($lev == 1) {
            $req->session()->flash('edmsg','Leave for employee updated successfully.');
        }
        else {
            $req->session()->flash('edmsg','Sorry, try again!');
        }
        return redirect('/leaves');
    }

    public function del_lev($lid, Request $req) {
        $delrec = Leave::where('l_id', $lid)->delete();
        if($delrec > 0) {
            $req->session()->flash('delmsg','Leave for employee deleted successfully.');
        }
        else {
            $req->session()->flash('delmsg','Sorry, try again!');
        }
        return redirect('/leaves');
    }

}