<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;
use App\Models\Employee;
// use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class PayController extends Controller
{
    public function index() {
        $data = DB::select('select * from tblpayments');
        return view('pay.index', ['data' => $data]);
    }

    public function add_pay() {
        return view('pay.gen_pay');
    }

    public function gen_pay(Request $req) {
        $perd = $req->input('ip_period');
        $perd = date_format(date_create($perd), "Y-m");
        $e_info = Employee::join('tblempsal', 'tblempsal.e_id', '=', 'tblemp.e_id')
                ->where('tblemp.e_status', '=', '1')
                ->whereNull('tblempsal.es_end')
                ->get(['tblemp.e_id', 'tblempsal.es_nsal']);
        // dd($e_info);
        foreach ($e_info as $item) {
            $pay = new Payment;
            $pay->e_id = $item['e_id'];
            $eid = $item['e_id'];
            $pay->p_period = $perd;
            $pay->es_nsal = $item['es_nsal'];
            
            $delay = DB::select("SELECT e_id, FLOOR(COUNT(at_delayed)/3) AS del_cnt FROM tblattend WHERE SUBSTR(at_date,1,7)='$perd' AND e_id='$eid'");
            $day_sal = $item['es_nsal']/30;
            $ded = $day_sal * $delay[0]->del_cnt;
            
            $pay->p_ded = $ded;

            $wd = DB::table('tblworkdays')->select('wo_thours')->where('wo_period', $perd)->get();
            $ot_hrs = DB::select("SELECT SUM(SUBSTR(at_hrs_wrkd, 1,POSITION('.' IN at_hrs_wrkd)-1)) AS hrs, SUM(SUBSTR(at_hrs_wrkd, POSITION('.' IN at_hrs_wrkd)+1)) AS mints FROM tblattend WHERE at_date LIKE '$perd%' AND e_id='$eid'");
            // AND at_delayed IS NULL
            $mints = $ot_hrs[0]->mints;
            $x = 0;
            if($mints > 59) {
                $x = floor($mints/60);
                $mints = fmod($mints, 60);
            }
            $hrs = $ot_hrs[0]->hrs + $x;
            $hrs = $hrs + ($mints/100);
            
            if($hrs > $wd[0]->wo_thours) {
                $hr_sal = $day_sal / 8;
                $ot_rate = 1.5 * $hr_sal;
                $added = ($hrs - $wd[0]->wo_thours) * $ot_rate;
                $pay->p_add = $added;
            }

            $pay->p_paid = $item['es_nsal'] + $added - $ded;
            $pay->save();
        }
        return redirect('/payments');
    }

}