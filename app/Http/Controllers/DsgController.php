<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Designation;
use Illuminate\Support\Facades\Session;

class DsgController extends Controller
{
    public function index() {
        $data = Designation::all();
        return view('dsg.index', ['data' => $data]);
    }

    public function add_dsg() {
        return view('dsg.add_dsg');
    }

    public function sav_dsg(Request $req) {
        $dsg = new Designation;
        $dsg->dg_title = $req->input('idg_title');
        $dsg->dg_desc = $req->input('idg_desc');
        $dsg->save();
        $req->session()->flash('admsg','Designation added successfully.');
        return redirect('/add_dsgns');
    }

    public function ed_dsg($dgid) {
        $data = Designation::where('dg_id', $dgid)->get();
        return view('dsg.ed_dsg', ['data'=> $data]);
    }

    public function upd_dsg(Request $req) {
        $data = $req->input();
        $dsg = Designation::where('dg_id', $data['idg_id'])
                ->update([
                    'dg_title' => $data['idg_title'],
                    'dg_desc' => $data['idg_desc']
                    ]);
        if($dsg == 1) {
            $req->session()->flash('edmsg','Designation updated successfully.');
        }
        else {
            $req->session()->flash('edmsg','Sorry, try again!');
        }
        return redirect('/designations');
    }

    public function del_dsg($dgid, Request $req) {
        $delrec = Designation::where('dg_id', $dgid)->delete();
        if($delrec > 0) {
            $req->session()->flash('delmsg','Designation deleted successfully.');
        }
        else {
            $req->session()->flash('delmsg','Sorry, try again!');
        }
        return redirect('/designations');
    }

}
