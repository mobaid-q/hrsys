<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index() {
        return view('home.index');
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
			if ($user[0]->password==$req->input('ipassword')){
				$req->session()->put('user', $user[0]->name);
				return redirect('/');
			}
			else {
				return redirect('/login');
			}
		}
    }


}
