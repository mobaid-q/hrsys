<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Req_emp;
use App\Models\Employee;
use Illuminate\Support\Facades\Session;
use App\Http\Traits\Get_Img;

class HomeController extends Controller
{   
    use Get_Img;

    public function index() {
        $today = date("Y-m-d");
        $data = Req_emp::where('req_status', 'unread')->orderBy('req_id', 'desc')->limit(5)->get();
        $lev = "SELECT l.e_id, l.l_edate, e.e_fname, e.e_lname FROM tblleaves l, tblemp e WHERE DATE_ADD(l.l_edate, INTERVAL 1 DAY) = CURDATE() and l.e_id = e.e_id ";
        $lev = DB::select($lev);
        $delayed = Employee::join('tblattend', 'tblattend.e_id', '=', 'tblemp.e_id')
            ->where('tblattend.at_checkin', '>', '08:30')
            ->where('tblattend.at_date', $today)
            ->get(['tblattend.*', 'tblemp.e_fname', 'tblemp.e_lname']);
        return view('home.index', ['data' => $data, 'lev' => $lev, 'delayed' => $delayed]);
    }

    public function login() {
        return view('login.index');
    }
    
    public function chk_login(Request $req) {
        $user = DB::select("select * from users where email = ?",[$req->input('iemail')]);
		if (!$user) {
			return redirect('/login');
		}
		else {
			// if (Crypt::decrypt($user[0]->password)==$req->input('pwd')){
			if ($user[0]->password==$req->input('ipassword')) {
				$req->session()->put('user', $user[0]->name);
				$req->session()->put('is_admin', $user[0]->is_admin);
				$req->session()->put('u_id', $user[0]->id);
                $this->img_set($user[0]->id);
				
                if($user[0]->is_admin == 1) {
                    return redirect('/');
                }
                else {
                    // return redirect('/user/'.$user[0]->id);
                    return redirect('/user');
                }
			}
            
            else {
                return redirect('/login');
            }
		}
    }

}
