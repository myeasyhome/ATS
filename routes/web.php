<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();
Route::get('/login', 'Auth\LoginController@index')->name('show.login');
Route::get('/login', 'Auth\LoginController@logout')->name('logout');

Route::post('/login', 'Auth\LoginController@login')->name('login');
// Route::get('/home', 'HomeController@index')->name('home');


/* Akses Line Manager 1 */
// Route::get('/dashboard/Line_manager1', 'Line_Manager1\DashboardController@index')->name('dashboard.LM1');
Route::get('/ticket', 'Line_Manager1\TicketController@index')->name('ticket');
Route::get('/ticket/create', 'Line_Manager1\TicketController@create')->name('create.ticket');
Route::post('/ticket/store', 'Line_Manager1\TicketController@store')->name('store.ticket');
Route::get('/ticket/edit/{id}', 'Line_Manager1\TicketController@edit')->name('edit.ticket');
Route::patch('/ticket/update/{id}', 'Line_Manager1\TicketController@update')->name('update.ticket');
Route::delete('/ticket/delete/{id}', 'Line_Manager1\TicketController@delete')->name('delete.ticket');
Route::get('/ticket/reject_detail/{id}', 'Line_Manager1\TicketController@rejected_reason')->name('reason.ticket');

/*cek position*/
Route::post('/checkPosition', 'Line_Manager1\TicketController@checkPosition');

Route::get('/group/{id}','Line_Manager1\TicketController@group_dropdown');
Route::get('/division/{id}','Line_Manager1\TicketController@division_dropdown');
Route::get('/department/{id}','Line_Manager1\TicketController@department_dropdown');

Route::get('/ticket/re-approval/request/{id}', 'Line_Manager1\TicketController@edit')->name('edit_rejected.ticket');
Route::patch('/ticket/re-approval/{id}', 'Line_Manager1\TicketController@re_approval')->name('re_approval.ticket');



/* Access Line Manager 2 */
Route::get('/ticket/lm2/list','Line_Manager2\ApprovalController@index')->name('lm2.list');
Route::get('/ticket/lm2/approval','Line_Manager2\ApprovalController@approval')->name('lm2.approval');
Route::get('/ticket/lm2/detail/{id}', 'Line_Manager2\ApprovalController@detail')->name('lm2.detail.ticket');
Route::patch('/ticket/lm2/approval/{id}', 'Line_Manager2\ApprovalController@approved')->name('approved.ticket');
Route::patch('/ticket/lm2/reject/{id}', 'Line_Manager2\ApprovalController@reject')->name('reject.ticket');



/* Access HR BP */
// Route::get('/dashboard/HR_BussinessPartner', 'HR_BussinessPartner\DashboardController@index')->name('dashboard.HR_bp');
Route::get('/ticket/hrbp/list', 'HR_BussinessPartner\TicketController@list')->name('hrbp.list');
Route::get('/ticket/hrbp/approval', 'HR_BussinessPartner\TicketController@approval')->name('hrbp.approval');
Route::patch('/ticket/hrbp/approval/{id}', 'HR_BussinessPartner\TicketController@approved')->name('hrbp.approved');
Route::patch('/ticket/hrbp/reject/{id}', 'HR_BussinessPartner\TicketController@reject')->name('hrbp.reject');
Route::get('/ticket/hrbp/detail/{id}', 'HR_BussinessPartner\TicketController@detail')->name('hrbp.detail');

/* approval result hiring on HRBP*/
Route::get('/ticket/hrbp/result_brief/detail/{id}', 'HR_BussinessPartner\ApprovalResultBriefController@detail')->name('hrbp.detail.result');
Route::get('/ticket/hrbp/approval_hiring', 'HR_BussinessPartner\ApprovalResultBriefController@index')->name('hrbp.approval.hiring');
Route::patch('/ticket/hrbp/result_brief/approved/{id}', 'HR_BussinessPartner\ApprovalResultBriefController@approved_result_hiring')->name('hrbp.approved.result');
Route::patch('/ticket/hrbp/result_brief/reject/{id}', 'HR_BussinessPartner\ApprovalResultBriefController@reject_result_hiring')->name('hrbp.reject.result');


/* Access HR Talent Acquistion */
Route::get('/dashboard/hr_talent', 'HR_Talent\DashboardController@index')->name('hrt.dashboard');
Route::get('/hiring', 'HR_Talent\ProcessController@index')->name('hiring_brief');
Route::get('/hiring/create/{id}', 'HR_Talent\ProcessController@create')->name('create.brief');
Route::patch('/hiring/schedule/{id}', 'HR_Talent\ProcessController@schedule')->name('schedule.brief');
Route::get('/hiring/input/{id}', 'HR_Talent\ProcessController@input_brief')->name('input.brief');
Route::patch('/hiring/store_input/{id}', 'HR_Talent\ProcessController@store_input_brief')->name('store.input.brief');
Route::get('/hiring/rejected_reason/{id}', 'HR_Talent\ProcessController@rejected_reason')->name('reject.reason.brief');

/* CV & Sourcing */
Route::get('/sourcing','HR_Talent\SourcingController@index')->name('sourcing');



/* Access HR Operation */


