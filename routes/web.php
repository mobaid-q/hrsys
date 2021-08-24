<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdmChkMw;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware([AdmChkMw::class])->group(function () {

    Route::get('/', 'App\Http\Controllers\HomeController@index');
    Route::get('/login', 'App\Http\Controllers\HomeController@login') ->withoutMiddleware([AdmChkMw::class]);
    Route::post('/login', 'App\Http\Controllers\HomeController@chk_login') ->withoutMiddleware([AdmChkMw::class]);
    Route::get('/logout', function() {
        session()->flush();
        return redirect('/login');
    })->withoutMiddleware([AdmChkMw::class]);

    Route::get('/branches', 'App\Http\Controllers\BranchController@index');
    Route::get('/add_branch', 'App\Http\Controllers\BranchController@add_br');
    Route::post('/add_branch', 'App\Http\Controllers\BranchController@sav_br');
    Route::get('/ed_branch/{brid}', 'App\Http\Controllers\BranchController@ed_br');
    Route::post('/ed_branch', 'App\Http\Controllers\BranchController@upd_br');
    Route::get('/del_branch/{brid}', 'App\Http\Controllers\BranchController@del_br');

    Route::get('/departments', 'App\Http\Controllers\DepController@index');
    Route::get('/add_dept', 'App\Http\Controllers\DepController@add_dep');
    Route::post('/add_dept', 'App\Http\Controllers\DepController@sav_dep');
    Route::get('/ed_dept/{did}', 'App\Http\Controllers\DepController@ed_dep');
    Route::post('/ed_dept', 'App\Http\Controllers\DepController@upd_dep');
    Route::get('/del_dept/{did}', 'App\Http\Controllers\DepController@del_dep');

    Route::get('/employees', 'App\Http\Controllers\EmpController@index');
    Route::get('/add_employee', 'App\Http\Controllers\EmpController@add_emp');
    Route::post('/get_brxdept', 'App\Http\Controllers\EmpController@get_brxdept');
    Route::post('/add_employee', 'App\Http\Controllers\EmpController@sav_emp');
    Route::get('/ed_employee/{eid}', 'App\Http\Controllers\EmpController@ed_emp');
    Route::post('/ed_employee', 'App\Http\Controllers\EmpController@upd_emp');
    Route::get('/del_employee/{eid}', 'App\Http\Controllers\EmpController@del_emp');

    Route::get('/emp_types', 'App\Http\Controllers\EmTypController@index');
    Route::get('/add_emptype', 'App\Http\Controllers\EmTypController@add_etype');
    Route::post('/add_emptype', 'App\Http\Controllers\EmTypController@sav_etype');
    Route::get('/ed_emptype/{etid}', 'App\Http\Controllers\EmTypController@ed_etype');
    Route::post('/ed_emptype', 'App\Http\Controllers\EmTypController@upd_etype');
    Route::get('/del_emptype/{etid}', 'App\Http\Controllers\EmTypController@del_etype');

    Route::get('/attendance', 'App\Http\Controllers\AttendController@index');
    Route::get('/add_attend', 'App\Http\Controllers\AttendController@add_att');
    Route::post('/add_attend', 'App\Http\Controllers\AttendController@sav_att');
    Route::get('/upl_attend', 'App\Http\Controllers\AttendController@upl_att');
    Route::post('/upl_attend', 'App\Http\Controllers\AttendController@sav_sheet');
    Route::get('/ed_attend/{atid}', 'App\Http\Controllers\AttendController@ed_att');
    Route::post('/ed_attend', 'App\Http\Controllers\AttendController@upd_att');
    Route::get('/del_attend/{atid}', 'App\Http\Controllers\AttendController@del_att');

    Route::get('/leaves', 'App\Http\Controllers\LeavesController@index');
    Route::get('/add_leaves', 'App\Http\Controllers\LeavesController@add_lev');
    Route::post('/get_emxlq', 'App\Http\Controllers\LeavesController@get_emxlq');
    Route::post('/add_leaves', 'App\Http\Controllers\LeavesController@sav_lev');
    Route::get('/ed_leaves/{lid}', 'App\Http\Controllers\LeavesController@ed_lev');
    Route::post('/ed_leaves', 'App\Http\Controllers\LeavesController@upd_lev');
    Route::get('/del_leaves/{lid}', 'App\Http\Controllers\LeavesController@del_lev');

    Route::get('/levs_quota', 'App\Http\Controllers\QuoLevController@index');
    Route::get('/add_quota', 'App\Http\Controllers\QuoLevController@add_quo');
    Route::post('/add_quota', 'App\Http\Controllers\QuoLevController@sav_quo');
    Route::get('/ed_quota/{qid}', 'App\Http\Controllers\QuoLevController@ed_quo');
    Route::post('/ed_quota', 'App\Http\Controllers\QuoLevController@upd_quo');
    Route::get('/del_quota/{qid}', 'App\Http\Controllers\QuoLevController@del_quo');

    Route::get('/designations', 'App\Http\Controllers\DsgController@index');
    Route::get('/add_dsgns', 'App\Http\Controllers\DsgController@add_dsg');
    Route::post('/add_dsgns', 'App\Http\Controllers\DsgController@sav_dsg');
    Route::get('/ed_dsgns/{dgid}', 'App\Http\Controllers\DsgController@ed_dsg');
    Route::post('/ed_dsgns', 'App\Http\Controllers\DsgController@upd_dsg');
    Route::get('/del_dsgns/{dgid}', 'App\Http\Controllers\DsgController@del_dsg');

    Route::get('/documents', 'App\Http\Controllers\DocsController@index');
    Route::get('/upload_docs', 'App\Http\Controllers\DocsController@upl_doc');
    Route::post('/upload_docs', 'App\Http\Controllers\DocsController@sav_doc');
    Route::get('/ed_doc/{docid}', 'App\Http\Controllers\DocsController@ed_doc');
    Route::post('/ed_doc', 'App\Http\Controllers\DocsController@upd_doc');
    Route::get('/del_doc/{docid}', 'App\Http\Controllers\DocsController@del_doc');

    Route::get('/salaries', 'App\Http\Controllers\SalController@index');
    Route::get('/add_salary', 'App\Http\Controllers\SalController@add_sal');
    Route::post('/add_salary', 'App\Http\Controllers\SalController@sav_sal');
    Route::get('/ed_salary/{esid}', 'App\Http\Controllers\SalController@ed_sal');
    Route::post('/ed_salary', 'App\Http\Controllers\SalController@upd_sal');
    Route::get('/del_salary/{esid}', 'App\Http\Controllers\SalController@del_sal');

    Route::get('/payments', 'App\Http\Controllers\PayController@index');
    Route::get('/gen_payments', 'App\Http\Controllers\PayController@add_pay');
    Route::post('/gen_payments', 'App\Http\Controllers\PayController@gen_pay');
    Route::get('/ed_payments/{pid}', 'App\Http\Controllers\SalController@ed_pay');
    Route::post('/ed_payments', 'App\Http\Controllers\SalController@upd_pay');
    Route::get('/del_payments/{pid}', 'App\Http\Controllers\SalController@del_pay');

    Route::get('/requests', 'App\Http\Controllers\ReqEmpController@index');    
    Route::get('/ed_request/{rid}', 'App\Http\Controllers\ReqEmpController@ed_req');    
    Route::post('/ed_request', 'App\Http\Controllers\ReqEmpController@sav_req');    
    Route::get('/status_req/{rid}', 'App\Http\Controllers\ReqEmpController@status_req');    
    Route::get('/del_request/{rid}', 'App\Http\Controllers\ReqEmpController@del_req');
    
    Route::get('/workdays', 'App\Http\Controllers\WorkDaysController@index');
    Route::get('/ad_workdays', 'App\Http\Controllers\WorkDaysController@cal_wd');
    Route::post('/ad_workdays', 'App\Http\Controllers\WorkDaysController@sav_wd');
    Route::get('/ed_workdays/{wid}', 'App\Http\Controllers\WorkDaysController@ed_wd');
    Route::post('/ed_workdays', 'App\Http\Controllers\WorkDaysController@upd_wd');
    Route::get('/del_workdays/{rid}', 'App\Http\Controllers\WorkDaysController@del_wd');

    Route::get('/sys_usrs', 'App\Http\Controllers\UsrIdController@index');
    Route::get('/ad_sys_usrs', 'App\Http\Controllers\UsrIdController@add_ids');
    Route::post('/ad_sys_usrs', 'App\Http\Controllers\UsrIdController@sav_ids');
    Route::get('/ed_sys_usrs/{id}', 'App\Http\Controllers\UsrIdController@ed_ids');
    Route::post('/ed_sys_usrs', 'App\Http\Controllers\UsrIdController@upd_ids');
    Route::get('/del_sys_usrs/{id}', 'App\Http\Controllers\UsrIdController@del_ids');

});

Route::get('/user', 'App\Http\Controllers\UsersController@index');

Route::get('/user/attend', 'App\Http\Controllers\UsersController@attend');

Route::get('/user/docs', 'App\Http\Controllers\UsersController@docs');
Route::get('/user/docs_dl/{u_file}', 'App\Http\Controllers\UsersController@docs_dl');

Route::get('/user/leaves', 'App\Http\Controllers\UsersController@leaves');
Route::get('/user/quota', 'App\Http\Controllers\UsersController@quota');
Route::get('/user/apply_lev', 'App\Http\Controllers\UsersController@apply_lev');
Route::post('/get_rem_lev', 'App\Http\Controllers\UsersController@get_rem_lev');
Route::post('/user/apply_lev', 'App\Http\Controllers\UsersController@sav_lev');

Route::get('/user/salary', 'App\Http\Controllers\UsersController@sal');
Route::get('/user/payments', 'App\Http\Controllers\UsersController@pay');

Route::get('/user/password', 'App\Http\Controllers\UsersController@pwd');
Route::post('/user/password', 'App\Http\Controllers\UsersController@ch_pwd');

Route::get('/user/requests', 'App\Http\Controllers\UsersController@req');
Route::get('/user/new_req', 'App\Http\Controllers\UsersController@new_req');
Route::post('/user/new_req', 'App\Http\Controllers\UsersController@sav_req');

Route::get('/show-image/{fname}/{dir}', function($fname, $dir) {
   $file = storage_path('app/'.$dir.'/'.$fname);
   return response()->file($file);
});

