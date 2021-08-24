<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Empsalary;
use Illuminate\Support\Facades\Session;
use App\Http\Traits\Tax;

class SalController extends Controller
{
    use Tax;
    public function index() {
        $data = Empsalary::all();
        return view('sal.index', ['data' => $data]);
    }

    public function add_sal() {
        $data = DB::table('tblemp')->get();
        return view('sal.add_sal', ['data' => $data]);
    }

    public function sav_sal(Request $req) {
        $esal = new Empsalary;
        $data = $req->input();
        $esal->e_id = $data['ie_id'];
        $esal->es_agreed = $data['ies_agreed'];
        $esal->es_start = date_format(date_create($data['ies_start']), "Y-m-d");
        if($data['ies_end'] != '') {
            $esal->es_end = date_format(date_create($data['ies_end']), "Y-m-d");
        }
        $esal->es_account = $data['ies_account'];
        $esal->es_iban = $data['ies_iban'];
        $esal->es_nsal = $this->ret_tax($data['ies_agreed']);
        $esal->save();
        $req->session()->flash('admsg','Salary for the employee added successfully.');
        return redirect('/add_salary');
    }

    public function ed_sal($esid) {
        $data = Empsalary::where('es_id', $esid)->get();
        $emp = DB::select("select * from tblemp");
        return view('sal.ed_sal', ['data'=> $data, 'emp' => $emp]);
    }

    public function upd_sal(Request $req) {
        $data = $req->input();
        $sal = Empsalary::where('es_id', $data['ies_id'])
                ->update([
                    'es_agreed' => $data['ies_agreed'],
                    'es_nsal' => $this->ret_tax($data['ies_agreed']),
                    'es_account' => $data['ies_account'],
                    'es_iban' => $data['ies_iban'],
                    'e_id' => $data['ie_id'],
                    'es_start' => $data['ies_start'],
                    'es_end' => $data['ies_end']
                    ]);
        if($sal == 1) {
            $req->session()->flash('edmsg','Employee salary updated successfully.');
        }
        else {
            $req->session()->flash('edmsg','Sorry, try again!');
        }
        return redirect('/salaries');
    }

    public function del_sal($did, Request $req) {
        $delrec = Empsalary::where('d_id', $did)->delete();
        if($delrec > 0) {
            $req->session()->flash('delmsg','Employee salary deleted successfully.');
        }
        else {
            $req->session()->flash('delmsg','Sorry, try again!');
        }
        return redirect('/salaries');
    }

}