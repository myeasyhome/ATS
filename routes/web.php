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

Route::get('/', function () {
    return redirect(url('login'));
});

// Auth::routes();
Route::get('/login', 'Auth\LoginController@index')->name('show.login');
Route::get('/login', 'Auth\LoginController@logout')->name('logout');
Route::post('/login', 'Auth\LoginController@login')->name('login');
// Route::get('/home', 'HomeController@index')->name('home');


/* Akses Line Manager 1, bisa buat tiket */
Route::group(['middleware'=>'checkGrade'], function() {
	Route::get('/dashboard/LM1', 'Line_Manager1\DashboardController@index')->name('lm1.dashboard');

	Route::get('/ticket', 'Line_Manager1\TicketController@index')->name('ticket');
	Route::get('/ticket/create', 'Line_Manager1\TicketController@create')->name('create.ticket');
	Route::post('/ticket/store', 'Line_Manager1\TicketController@store')->name('store.ticket');
	Route::get('/ticket/edit/{id}', 'Line_Manager1\TicketController@edit')->name('edit.ticket');
	Route::patch('/ticket/update/{id}', 'Line_Manager1\TicketController@update')->name('update.ticket');
	Route::delete('/ticket/delete/{id}', 'Line_Manager1\TicketController@delete')->name('delete.ticket');
	Route::get('/ticket/detail/{id}', 'Line_Manager1\TicketController@detail')->name('detail.ticket');
	Route::get('/ticket/reject_detail/{id}', 'Line_Manager1\TicketController@rejected_reason')->name('reason.ticket');

	/*liat progress approval*/
	Route::get('/prog/{id}','Line_Manager1\TicketController@progress')->name('progress');

	/* Menu Candidate */
	Route::get('/candidate','Line_Manager1\CandidateController@index')->name('candidate');
	Route::get('/candidate/{id}','Line_Manager1\CandidateController@sourcing')->name('lm1.sourcing');
	// Route::get('/candidate/document/{id}','Line_Manager1\CandidateController@getCV')->name('getCV');
	Route::patch('/candidate/approve/{id}','Line_Manager1\CandidateController@approve_candidate')->name('candidate.approve');
	Route::patch('/candidate/reject/{id}','Line_Manager1\CandidateController@reject_candidate')->name('candidate.reject');

	Route::patch('candidate/SLA_CVFeedback/{id}','Line_Manager1\CandidateController@SLA_CVFeedback')->name('SLA_CVFeedback');

	/* Menu Interview Process */
	Route::group(['prefix'=>'interview_process'], function() {
		Route::get('/','Line_Manager1\InterviewController@index')->name('lm1_index.interview');
		Route::get('feedback_list/{id}/{position}','Line_Manager1\InterviewController@feedback_list')->name('lm1_feedback_list.interview');
		Route::patch('/interview_finish/{id}','Line_Manager1\InterviewController@interview_finish')->name('lm1_interview_finish');
		Route::get('form_feedback/{id}/{position}','Line_Manager1\InterviewController@form_interviewFeedback')->name('form_interviewFeedback');
	});
});


/*cek position*/
Route::post('/checkPosition', 'Line_Manager1\TicketController@checkPosition');

Route::get('/group/{id}','Line_Manager1\TicketController@group_dropdown');
Route::get('/division/{id}','Line_Manager1\TicketController@division_dropdown');
Route::get('/department/{id}','Line_Manager1\TicketController@department_dropdown');

Route::get('/ticket/re-approval/request/{id}', 'Line_Manager1\TicketController@edit')->name('edit_rejected.ticket');
Route::patch('/ticket/re-approval/{id}', 'Line_Manager1\TicketController@re_approval')->name('re_approval.ticket');


Route::post('importExcel','Line_Manager1\TicketController@import')->name('import');



/* Access Line Manager 2 */
Route::get('/ticket/DH/list','Division_Head\ApprovalController@index')->name('dh.list');
Route::get('/ticket/DH/approval','Division_Head\ApprovalController@approval')->name('dh.approval');
Route::get('/ticket/DH/detail/{id}', 'Division_Head\ApprovalController@detail')->name('dh.detail.ticket');
Route::patch('/ticket/DH/approval/{id}', 'Division_Head\ApprovalController@approved')->name('approved.ticket');
Route::patch('/ticket/DH/reject/{id}', 'Division_Head\ApprovalController@reject')->name('reject.ticket');



/* Akses Group Head */
Route::group(['prefix'=>'ticket/GH','middleware'=>'auth'], function() {
	Route::get('list','Group_Head\ApprovalController@index')->name('gh.list');
	Route::get('detail/{id}','Group_Head\ApprovalController@detail')->name('gh.detail.ticket');
	Route::patch('approval/{id}', 'Group_Head\ApprovalController@approved')->name('gh.approved.ticket');
	Route::patch('reject/{id}', 'Group_Head\ApprovalController@reject')->name('gh.reject.ticket');
});

/* Akses Chief */
Route::group(['prefix'=>'ticket/Chief','middleware'=>'auth'], function() {
	Route::get('list','Chief\ApprovalController@index')->name('chief.list');
	Route::get('detail/{id}','Chief\ApprovalController@detail')->name('chief.detail.ticket');
	Route::patch('approval/{id}', 'Chief\ApprovalController@approved')->name('chief.approved.ticket');
	Route::patch('reject/{id}', 'Chief\ApprovalController@reject')->name('chief.reject.ticket');
});

/* Access HR BP */
// Route::get('/dashboard/HR_BussinessPartner', 'HR_BussinessPartner\DashboardController@index')->name('dashboard.HR_bp');
Route::get('/ticket/hrbp/list', 'HR_BussinessPartner\TicketController@list')->name('hrbp.list');
Route::patch('/ticket/hrbp/approval/{id}', 'HR_BussinessPartner\TicketController@approved')->name('hrbp.approved');
Route::patch('/ticket/hrbp/reject/{id}', 'HR_BussinessPartner\TicketController@reject')->name('hrbp.reject');
Route::get('/ticket/hrbp/ticketDetail/{id}', 'HR_BussinessPartner\TicketController@detail')->name('hrbp.detail');

/* approval result hiring on HRBP*/
Route::get('/ticket/hrbp/approval_hiring', 'HR_BussinessPartner\ApprovalResultBriefController@index')->name('hrbp.approval.hiring');
Route::get('/ticket/hrbp/result_brief/detail/{id}', 'HR_BussinessPartner\ApprovalResultBriefController@detail')->name('hrbp.detail.result');
Route::patch('/ticket/hrbp/result_brief/approved/{id}', 'HR_BussinessPartner\ApprovalResultBriefController@approved_result_hiring')->name('hrbp.approved.result');
Route::patch('/ticket/hrbp/result_brief/reject/{id}', 'HR_BussinessPartner\ApprovalResultBriefController@reject_result_hiring')->name('hrbp.reject.result');


/* Access HR Talent Acquistion */
Route::get('/dashboard/HRTA', 'HR_Talent\DashboardController@index')->name('hrt.dashboard');
Route::patch('/freezeTicket/{id}','HR_Talent\DashboardController@freeze')->name('freeze');
Route::patch('/unfreezeTicket/{id}','HR_Talent\DashboardController@unfreeze')->name('unfreeze');
Route::get('/dashboard/detailTicket/{id}','HR_Talent\DashboardController@detailTicket')->name('dashboard.detailTicket');
/* kolom recruiter */
Route::patch('/updateRecruiter/{id}','HR_Talent\DashboardController@updateRecruiter')->name('updateRecruiter');

/* HIRING BRIEF */
Route::get('/hiring', 'HR_Talent\HiringBriefController@index')->name('hiring_brief');
Route::get('/hiring/create/{id}', 'HR_Talent\HiringBriefController@create')->name('create.brief');
Route::patch('/hiring/schedule/{id}', 'HR_Talent\HiringBriefController@schedule')->name('schedule.brief');
Route::get('/hiring/input/{id}', 'HR_Talent\HiringBriefController@input_brief')->name('input.brief');
Route::patch('/hiring/store_input/{id}', 'HR_Talent\HiringBriefController@store_input_brief')->name('store.input.brief');
Route::get('/hiring/rejected_reason/{id}', 'HR_Talent\HiringBriefController@rejected_reason')->name('reject.reason.brief');
Route::get('hiring/detail/{id}','HR_Talent\HiringBriefController@detail')->name('hiring.detail');

/* CV & SOURCING */
Route::get('/sourcing','HR_Talent\SourcingController@index')->name('sourcing');
Route::get('/sourcing/{id}','HR_Talent\SourcingController@upload')->name('upload');
Route::post('/sourcing/store','HR_Talent\SourcingController@doUpload')->name('doUpload');
Route::get('/getDocument/{id}','HR_Talent\SourcingController@getDocument')->name('getDocument');
Route::delete('sourcing/delete/{id}','HR_Talent\SourcingController@delete')->name('delete.sourcing');
Route::patch('/sourcing/nextProcess/{id}','HR_Talent\SourcingController@nextProcess')->name('nextProcess.sourcing');
Route::get('/sourcing/candidate/{id}','HR_Talent\SourcingController@showCandidate')->name('showCandidate');

/* INTERVIEW PROCESS */
Route::group(['prefix'=>'interview'], function() {
	Route::get('/','HR_Talent\InterviewController@index')->name('index.interview');
	Route::get('candidate_list/{id}','HR_Talent\InterviewController@candidate_list')->name('candidate_list.interview');
	Route::post('invitation','HR_Talent\InterviewController@invitation')->name('invitation.interview');
});


/* Access HR Operation */



/* ACCESS PUBLIC */
Route::get('/candidate_detail/{id}','Line_Manager1\CandidateController@candidate_detail')->name('candidate_detail');
Route::get('/candidate/document/{id}','Line_Manager1\CandidateController@getCV')->name('getCV');
