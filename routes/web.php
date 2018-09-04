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

Route::get('/division/{id}','Line_Manager1\TicketController@division_dropdown');
Route::get('/department/{id}','Line_Manager1\TicketController@department_dropdown');

Route::get('/ticket/re-approval/request/{id}', 'Line_Manager1\TicketController@edit')->name('edit_rejected.ticket');
Route::patch('/ticket/re-approval/{id}', 'Line_Manager1\TicketController@re_approval')->name('re_approval.ticket');



/* Access Line Manager 2 */
Route::get('/ticket/lm2/list','Line_Manager2\ApprovalController@index')->name('lm2.list');
Route::get('/ticket/lm2/approval','Line_Manager2\ApprovalController@approval')->name('lm2.approval');
Route::get('/ticket/lm2/detail/{id}', 'Line_Manager2\ApprovalController@detail')->name('detail.ticket');
Route::patch('/ticket/lm2/approval/{id}', 'Line_Manager2\ApprovalController@approved')->name('approved.ticket');
Route::patch('/ticket/lm2/reject/{id}', 'Line_Manager2\ApprovalController@reject')->name('reject.ticket');
// Route::get('/ticket/lm2/detail_ticket', 'Line_Manager2\ApprovalController@reject')->name('detail.ticket');



/* Access HR BP */
// Route::get('/dashboard/HR_BussinessPartner', 'HR_BussinessPartner\DashboardController@index')->name('dashboard.HR_bp');
Route::get('/ticket/hrbp/list', 'HR_BussinessPartner\TicketController@list')->name('hrbp.list');
Route::get('/ticket/hrbp/approval', 'HR_BussinessPartner\TicketController@approval')->name('hrbp.approval');
Route::patch('/ticket/hrbp/approval/{id}', 'HR_BussinessPartner\TicketController@approved')->name('hrbp.approved');
Route::patch('/ticket/hrbp/reject/{id}', 'HR_BussinessPartner\TicketController@reject')->name('hrbp.reject');
Route::get('/ticket/hrbp/detail/{id}', 'Line_Manager2\ApprovalController@detail')->name('hrbp.detail');



/* Access HR Talent Acquistion */
Route::get('/dashboard/hr_talent', 'HR_Talent\DashboardController@index')->name('hrt.dashboard');
Route::get('/hiring', 'HR_Talent\ProcessController@index')->name('hiring_brief');
Route::get('/hiring/create/{id}', 'HR_Talent\ProcessController@create')->name('create.brief');
Route::post('/hiring/store', 'HR_Talent\ProcessController@store')->name('store.brief');



/* Access HR Operation */


