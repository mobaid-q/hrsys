<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Emptype;
use Illuminate\Support\Facades\Session;

class EmTypController extends Controller
{
    public function index() {
        $data = Emptype::all();
        return view('emtype.index', ['data' => $data]);
    }

    public function add_etype() {
        return view('emtype.add_etype');
    }

    public function sav_etype(Request $req) {
        $etype = new Emptype;
        $etype->et_title = $req->input('iet_title');
        $etype->et_desc = $req->input('iet_desc');
        $etype->save();
        $req->session()->flash('admsg','Employee type added successfully.');
        return redirect('/add_emptype');
    }

    public function ed_etype($etid) {
        $data = Emptype::where('et_id', $etid)->get();
        return view('emtype.ed_etype', ['data'=> $data]);
    }

    public function upd_etype(Request $req) {
        $data = $req->input();
        $dept = Emptype::where('et_id', $data['iet_id'])
                ->update([
                    'et_title' => $data['iet_title'],
                    'et_desc' => $data['iet_desc'],
                    ]);
        if($dept == 1) {
            $req->session()->flash('edmsg','Employee type updated successfully.');
        }
        else {
            $req->session()->flash('edmsg','Sorry, try again!');
        }
        return redirect('/emp_types');
    }

    public function del_etype($etid, Request $req) {
        $delrec = Emptype::where('et_id', $etid)->delete();
        if($delrec > 0) {
            $req->session()->flash('delmsg','Employee type deleted successfully.');
        }
        else {
            $req->session()->flash('delmsg','Sorry, try again!');
        }
        return redirect('/emp_types');
    }

}
