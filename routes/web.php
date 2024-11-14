<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardAdopedStudentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EndowmentController;
use App\Http\Controllers\FundaProjectController;
use App\Http\Controllers\DashboardTeamController;
use App\Http\Controllers\DashboardStudentController;
use App\Http\Controllers\DashboardEndowmentController;
use App\Http\Controllers\DefaulPackagetFullDegreeController;
use App\Http\Controllers\DefaultPackageOneYearDegreeController;
use App\Http\Controllers\DefaultPackagePerpetualSeatController;


Route::get('/dashboard', [AuthController::class, 'dashboardview'])->middleware('auth');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/user_list', [AuthController::class, 'userlist']);
Route::get('/user_edit/{id}', [AuthController::class, 'edit']);
Route::post('/user_update/{id}', [AuthController::class, 'update']);


// home page or index pages routes
Route::get('/',[HomeController::class, 'index']);

Route::get('/our_team',[HomeController::class, 'Team_index']);
Route::get('/meet_out_team/{id}',[HomeController::class, 'About_team']);
Route::get('/r_m_o',[HomeController::class, 'RMO']);
Route::get('/signrature_program',[HomeController::class, 'signrature_program_index']);
Route::get('/nust_trust_foundation',[HomeController::class, 'nust_trust_foundations']);
Route::get('/about_us',[HomeController::class, 'about_us_index']);
Route::get('/contact_us',[HomeController::class, 'contact_us_index']);

Route::get('/select_endowment_model',[EndowmentController::class, 'index']);
// for year default
Route::get('/support_for_entire_year',[EndowmentController::class, 'entireyear']);
Route::post('/default_package_full_degree',[DefaulPackagetFullDegreeController::class, 'store']);
Route::get('/default_package_defultfouryear',[DefaulPackagetFullDegreeController::class, 'defultfouryear']);
// for fout year custom package
Route::post('/endowmentsupportentireyear',[EndowmentController::class, 'entire_store']);

Route::get('/support_for_one_year',[EndowmentController::class, 'oneyearindex']);
Route::post('/default_one_year_degree',[DefaultPackageOneYearDegreeController::class, 'store']);
Route::get('/default_defultoneyear',[DefaultPackageOneYearDegreeController::class, 'defultoneyear']);
// for one custom package
Route::post('/endowmentsupportoneyear',[EndowmentController::class, 'oneyear_store']);

Route::get('/perpetualseatyourname',[EndowmentController::class, 'perpetualseat_index']);
Route::post('/default_perpetual_seat',[DefaultPackagePerpetualSeatController::class, 'store']);
Route::get('/default_perpetualseat',[DefaultPackagePerpetualSeatController::class, 'perpetualseat']);

Route::post('/perpetualseatyourname',[EndowmentController::class, 'perpetualseat_store']);
// zakat
Route::get('/zakat_for_students',[EndowmentController::class, 'zakat_index']);
Route::get('/zakat_payment',[EndowmentController::class, 'zakat_payment_index']);
Route::post('/zakat_payments',[EndowmentController::class, 'zakat_payment_store']);

Route::get('/select_project',[FundaProjectController::class, 'index']);
Route::get('/fund_project/{id}',[FundaProjectController::class, 'fund_project']);
Route::get('/payments_project/{id}',[FundaProjectController::class, 'payment_fund_a_project']);
Route::post('/fund_a_project',[FundaProjectController::class, 'payment_project']);

// student stories routes
Route::get('/student_stories', [StudentController::class, 'student_stories']);
Route::get('student_stories_indiviual/{id}', [StudentController::class, 'student_stories_ind']);

Route::get('/payment/{id}', [StudentController::class, 'payment_index']);
Route::get('/Make_a_Pledge/{id}', [StudentController::class, 'Make_a_Pledge']);
Route::post('/payments', [StudentController::class, 'store']);
Route::post('/pledge_payment', [StudentController::class, 'pledge_store']);

// Dashboard routes
Route::get('/students_get', [DashboardStudentController::class, 'list']);
Route::get('/add_students', [DashboardStudentController::class, 'store']);
Route::get('/students_edit/{id}', [DashboardStudentController::class, 'edit']);
Route::post('/students_update/{id}', [DashboardStudentController::class, 'update']);

// open funds students
Route::get('/open_funds_students_list', [DashboardStudentController::class, 'open_funds_students']);
Route::post('/open_fundlist', [DashboardStudentController::class, 'import']);

Route::get('openfundstudents_edit/{id}', [DashboardStudentController::class, 'edit_openfund']);
Route::post('openfundstudents_update/{id}', [DashboardStudentController::class, 'update_openfund']);
Route::delete('/multidelete', [DashboardStudentController::class, 'bulkDelete']);


Route::get('add_team', [DashboardTeamController::class, 'index']);
Route::post('add_team_member', [DashboardTeamController::class, 'store']);
Route::get('team_list', [DashboardTeamController::class, 'show']);
Route::get('team_edit/{id}', [DashboardTeamController::class, 'edit']);
Route::post('update_team/{id}', [DashboardTeamController::class, 'update']);
Route::get('team_delete/{id}', [DashboardTeamController::class, 'destory']);


Route::get('one_year_education', [DashboardEndowmentController::class, 'one_year']);
Route::get('entire_degree_education', [DashboardEndowmentController::class, 'entire_degree']);
Route::get('perpetual_seat_in__your__name', [DashboardEndowmentController::class, 'perpetual_seat']);
Route::get('zakat_support', [DashboardEndowmentController::class, 'zakat_support_for_student']);

Route::get('suport_scholor_payment', [DashboardEndowmentController::class, 'scholor_payment']);
Route::get('suport_scholor_pledge', [DashboardEndowmentController::class, 'scholor_pledge']);
Route::get('fundaproject', [DashboardEndowmentController::class, 'fund_project']);
Route::get('fundaproject', [DashboardEndowmentController::class, 'fund_project']);

// adoped list of students
Route::get('adoped_students', [DashboardAdopedStudentsController::class, 'adoped_student_list']);



Route::get('event_list', [EventController::class, 'index']);
Route::get('event_create', [EventController::class, 'create']);
Route::post('event_create', [EventController::class, 'store']);
Route::get('event_delete/{id}', [EventController::class, 'delete']);
