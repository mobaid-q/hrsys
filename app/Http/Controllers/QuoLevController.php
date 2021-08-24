<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Quotalev;
use Illuminate\Support\Facades\Session;

class QuoLevController extends Controller
{
    public function index() {
        $data = DB::select('select * from tblquolev');
        return view('quolev.index', ['data' => $data]);
    }

    public function add_quo() {
        $data = DB::select("select * from tblemp");
        return view('quolev.add_quo', ['data' => $data]);
    }

    public function sav_quo(Request $req) {
        $quolev = new Quotalev;
        $quolev->lq_title = $req->input('ilq_title');
        $quolev->lq_allowed = $req->input('ilq_allowed');
        $quolev->lq_pending = $req->input('ilq_pending');
        $quolev->lq_sdate = date_format(date_create($req->input('ilq_sdate')), "Y-m-d");
        $quolev->lq_edate = date_format(date_create($req->input('ilq_edate')), "Y-m-d");
        $quolev->e_id = $req->input('ie_id');
        if($quolev->save()) {
            $req->session()->flash('admsg','Quota Leave added successfully.');
        }
        else {
            $req->session()->flash('admsg','Sorry, try again!');
        }
        return redirect('/add_quota');
    }

    public function ed_quo($qid) {
        $data = Quotalev::where('lq_id', $qid)->get();
        $emp = DB::table('tblemp')->get();
        return view('quolev.ed_quo', ['data'=> $data, 'emp' => $emp]);
    }

    public function upd_quo(Request $req) {
        $data = $req->input();
        $qlev = Quotalev::where('lq_id', $data['ilq_id'])
                ->update([
                    'lq_title' => $data['ilq_title'],
                    'lq_allowed' => $data['ilq_allowed'],
                    'lq_pending' => $data['ilq_pending'],
                    'lq_sdate' => $data['ilq_sdate'],
                    'lq_edate' => $data['ilq_edate'],
                    'e_id' => $data['ie_id'],
                    ]);
        if($qlev == 1) {
            $req->session()->flash('edmsg','Employee\'s quota  updated successfully.');
        }
        else {
            $req->session()->flash('edmsg','Sorry, try again!');
        }
        return redirect('/levs_quota');
    }

    public function del_quo($qid, Request $req) {
        $delrec = Quotalev::where('lq_id', $qid)->delete();
        if($delrec > 0) {
            $req->session()->flash('delmsg','Employee\'s quota deleted successfully.');
        }
        else {
            $req->session()->flash('delmsg','Sorry, try again!');
        }
        return redirect('/levs_quota');
    }

}
