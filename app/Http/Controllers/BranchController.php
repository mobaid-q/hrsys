<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Branch;
use Illuminate\Support\Facades\Session;
// use Session;

class BranchController extends Controller
{
    public function index() {
        // $data = DB::select('select * from tblbranch');
        $data = Branch::all();
        return view('branch.index', ['data' => $data]);
    }
    
    public function add_br() {
        return view('branch.add_br');
    }

    public function sav_br(Request $req) {
        $branch = new Branch;
        $data = $req->input();
        /*
        $branch->br_name = $req->input('ibr_name');
        $branch->br_details = $req->input('ibr_details');
        */
        $branch->br_name = $data['ibr_name'];
        $branch->br_details = $data['ibr_details'];

        $branch->save();
        $req->session()->flash('admsg','Branch added successfully.');
        return redirect('/add_branch');
    }

    public function ed_br($brid) {
        $data = Branch::where('br_id', $brid)->get();
        return view('branch.ed_br', ['data'=>$data]);
    }
    
    public function upd_br(Request $req) {
        $data = $req->input();
        $branch = Branch::where('br_id', $data['ibr_id'])
                ->update([
                    'br_name' => $data['ibr_name'],
                    'br_details' => $data['ibr_details']
                    ]);
        if($branch == 1) {
            $req->session()->flash('edmsg','Branch updated successfully.');
        }
        else {
            $req->session()->flash('edmsg','Sorry, try again!');
        }
        return redirect('/branches');
    }

    public function del_br($brid, Request $req) {
        $delrec = Branch::where('br_id', $brid)->delete();
        if($delrec > 0) {
            $req->session()->flash('delmsg','Branch deleted successfully.');
        }
        else {
            $req->session()->flash('delmsg','Sorry, try again!');
        }
        return redirect('/branches');
    }

}
