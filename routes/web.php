<?php

use App\Http\Controllers\AppoinmentController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\DoctorController;


Route::get('/', function () {
    return view('page.index');
});

Route::get('/Login', function () {
    return view('page.Login');
});

Route::get('/adminDashboard', function () {
    return view('page.admin.admin');
});

Route::get('/Registation', function () {
    return view('page.Registation');
});

Route::get('/addDoctor', function () {
    return view('page.admin.add_doctor');

});

Route::get('/Doctor', function () {
    return view('page.doctor.dashboard');
});

Route::get('/patient', function () {
    return view('page.patient.dashboard');
});

Route::get('/AddAppoinment', function () {
    return view('page.patient.Appointments');
});

Route::get('/viewAppoinmentPatien', function () {
    return view('page.patient.View_Appointments');
});

Route::put('/updateAppoinment', function () {
    return view('page.patient.updateAppoinmentPatien');
});

Route::delete('/deleteAppoinment', function () {
    return view('page.patient.deleteAppoinmentPatien');
});


Route::get('/successfull', function () {
    return view('page.altet.successfull');
});

// function start here

Route::post('/logindata', [Logincontroller::class, 'handleLoginData']);
Route::post('/addnewdoctordata', [DoctorController::class, 'addnewdoctor']);
Route::post('/addnewappoiment', [AppoinmentController::class, 'addnewappoiment']);
Route::post('/selecteddoctors', [DoctorController::class, 'selecteddoctors']); // for specialization
Route::post('/selecteddoctorsname', [DoctorController::class, 'selecteddoctorsname']);


// loginchecking
Route::get('/adminDashboard', [Logincontroller::class, 'dashboardcheckingISlogin']);
Route::get('/patien', [Logincontroller::class, 'patieningISlogin']);
Route::get('/Doctor', [Logincontroller::class, 'DoctoringISlogin']);


//show appoinment

Route::get('/viewAppoinmentPatien',[PatientController::class,'getappoinment']);
Route::post('/selectedAppointment',[PatientController::class,'selectAppoinment']);
Route::post('/getvalidappoinment',[PatientController::class,'selectVailAppoinment']);
Route::put('/updateAppoinment',[PatientController::class,'updateAppoinment']);
Route::delete('/deleteAppoinment',[PatientController::class,'deleteAppoinment']);


// user registation
Route::post('/Registationnewuser',[PatientController::class,'save']);
