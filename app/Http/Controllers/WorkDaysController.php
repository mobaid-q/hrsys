<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\Gen_Workdays;
use App\Models\Workday;

class WorkDaysController extends Controller
{
    use Gen_Workdays;
    public function index() {
        $data = Workday::get();
        return view('workdays.index', ['data' => $data]);
    }

    public function cal_wd() {
        return view('workdays.ad_wd');
    }

    public function sav_wd(Request $req) {
        $holidays = [];
        $data = $req->input();
        $perd = date_format(date_create($data['iwo_period']), "Y-m");
        if($req->has('ihd_date')) {
            foreach($req->input('ihd_date') as $item) {
                $holidays[] = $item;
            }
        }
        $res = $this->get_workdays($perd, $holidays);
        if($res == 'true') {
            $req->session()->flash('admsg','Workdays generated successfully.');
        }
        else {
            $req->session()->flash('admsg','Sorry! try again.');
        }
        return redirect('/ad_workdays');

    }

    public function ed_wd($wid) {
        $data = Workday::where('wo_id', $wid)->get();
        return view('workdays.ed_wd', ['data' => $data]);
    }

    public function upd_wd(Request $req) {
        $data = $req->input();
        $upd_wd = Workday::where('wo_id', $data['iwo_id'])->update([
            'wo_period' =>date_format(date_create($data['iwo_period']), "Y-m"),
            'wo_tdays' => $data['iwo_tdays'],
            'wo_thours' => $data['iwo_thours']
        ]);
        if($upd_wd == 1) {
            $req->session()->flash('edmsg','Workdays updated successfully.');
        }
        else {
            $req->session()->flash('edmsg','Sorry, try again!');
        }
        return redirect('/workdays');
    }

    public function del_wd($wid, Request $req) {
        $delrec = Workday::where('wo_id', $wid)->delete();
        if($delrec > 0) {
            $req->session()->flash('delmsg','Workdays deleted successfully.');
        }
        else {
            $req->session()->flash('delmsg','Sorry, try again!');
        }
        return redirect('/workdays');
    }

}
