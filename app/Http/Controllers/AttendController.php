<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Attend;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class AttendController extends Controller
{
    public function index() {
        $data = Attend::all();
        return view('attend.index', ['data' => $data]);
    }

    public function add_att() {
        $data = DB::table('tblemp')->get();
        return view('attend.add_att', ['data' => $data]);
    }

    public function sav_att(Request $req) {
        $data = $req->input();
        $att = new Attend;
        $att->at_date = date_format(date_create($req->input('iat_date')), "Y-m-d");
        $att->at_checkin = $req->input('iat_checkin');
        $att->at_checkout = $req->input('iat_checkout');
        $att->e_id = $req->input('ie_id');
        $att->at_type = $req->input('iat_type');

        $chkin = Carbon::parse($data['iat_checkin']);
        $chkout = Carbon::parse($data['iat_checkout']);
        $hrs = intdiv($chkout->diffInMinutes($chkin), 60); //quotient
        $hrs = $hrs.".".($chkout->diffInMinutes($chkin)%60); //remainder
        
        $grace = '08:30';
        $is_delay = $chkin->gt(Carbon::parse($grace));
        if($is_delay == 'false') {
            $att->at_delayed = 'Yes';
        }

        $att->at_hrs_wrkd = $hrs;
        $att->save();
        $req->session()->flash('admsg','Attendance added successfully.');
        return redirect('/add_attend');
    }

    public function upl_att() {
        return view('attend.upl_att');
    }
    
    public function sav_sheet(Request $req) {
        $att_sheet = $req->file('iatt_sheet');
        $fname = $att_sheet->getPathName();
        $att_sheet = fopen($fname, 'r');
        while(($x = fgetcsv($att_sheet, ",")) !== FALSE) {
            $att = new Attend;
            $att->at_date = date_format(date_create($x[0]), "Y-m-d");
            $att->at_checkin = $x[1];
            $att->at_checkout = $x[2];
            
            $chkin = Carbon::parse($x[1]);
            $chkout = Carbon::parse($x[2]);
            $hrs = intdiv($chkout->diffInMinutes($chkin), 60); //quotient
            $hrs = $hrs.".".($chkout->diffInMinutes($chkin)%60); //remainder
            
            $grace = '08:30';
            $is_delay = $chkin->gt(Carbon::parse($grace));
            if($is_delay == 'false') {
                $att->at_delayed = 'Yes';
            }

            $att->at_hrs_wrkd = $hrs;
            $att->e_id = $x[3];
            $att->at_type = 'Machine';
            $att->save();
        }
        fclose($att_sheet);
        $req->session()->flash('admsg','Attendance uploaded successfully.');
        return redirect('/upl_attend');
    }
    
    public function ed_att($atid) {
        $data = Attend::where('at_id', $atid)->get();
        $emp = DB::table('tblemp')->get();
        return view('attend.ed_att', ['data'=> $data, 'emp' => $emp]);
    }
					 	
    public function upd_att(Request $req) {
        $data = $req->input();
        $chkin = Carbon::parse($data['iat_checkin']);
        $chkout = Carbon::parse($data['iat_checkout']);
        $hrs = intdiv($chkout->diffInMinutes($chkin), 60);
        $hrs = $hrs.".".($chkout->diffInMinutes($chkin)%60);
        $grace = '08:30';
        $is_delay = $chkin->gt(Carbon::parse($grace));
        if($is_delay == 'false') {
            $is_delay = 'Yes';
        }
        else {
            $is_delay = '';
        }

        $et = Attend::where('at_id', $data['iat_id'])
                ->update([
                    'at_date' => $data['iat_date'],
                    'at_checkin' => $data['iat_checkin'],
                    'at_checkout' => $data['iat_checkout'],
                    'at_hrs_wrkd' => $hrs,
                    'e_id' => $data['ie_id'],
                    'at_type' => $data['iat_type'],
                    'at_delayed' => $is_delay
                    ]);
        
        if($et == 1) {
            $req->session()->flash('edmsg','Attendance for employee updated successfully.');
        }
        else {
            $req->session()->flash('edmsg','Sorry, try again!');
        }
        return redirect('/attendance');
    }

    public function del_att($atid, Request $req) {
        $delrec = Attend::where('at_id', $atid)->delete();
        if($delrec > 0) {
            $req->session()->flash('delmsg','Attendance for employee deleted successfully.');
        }
        else {
            $req->session()->flash('delmsg','Sorry, try again!');
        }
        return redirect('/attendance');
    }

}
