<?php

use App\Http\Controllers\AppoinmentController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


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


Route::get('/patient', [Logincontroller::class, 'patieningISlogin']);

Route::get('/AddAppoinment', function () {
    return view('page.patient.Appointments');
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

// Test route for password verification
Route::get('/test-auth', function () {
    $admin = App\Models\Admin::first();
    if ($admin) {
        $passwordCheck = Hash::check('password123', $admin->password);
        return "Admin found: Yes<br>Password verification: " . ($passwordCheck ? 'Success' : 'Failed');
    }
    return "Admin found: No";
});

// Test route to check database tables
Route::get('/test-db', function () {
    $tables = DB::select('SHOW TABLES');
    $tableList = [];
    foreach($tables as $table) {
        $tableList[] = array_values((array)$table)[0];
    }
    return "Database tables: " . implode(', ', $tableList);
});

// Test route to check session data
Route::get('/test-session', function (Request $request) {
    $id = $request->session()->get('id');
    $Is_login = $request->session()->get('Is_login');
    $role = $request->session()->get('role');
    
    return "Session Data:<br>" .
           "ID: " . ($id ?? 'null') . "<br>" .
           "Is_login: " . ($Is_login ?? 'null') . "<br>" .
           "Role: " . ($role ?? 'null');
});

// Test route for doctor appointments
Route::get('/test-doctor-appointments', function (Request $request) {
    $id = $request->session()->get('id');
    $Is_login = $request->session()->get('Is_login');
    
    if ($id && $Is_login == 'yes') {
        $appointments = DB::select("SELECT * FROM bookings WHERE doctorid = ? AND payment_status = 'paid'", [$id]);
        return "Doctor ID: " . $id . "<br>Appointments: " . count($appointments) . "<br>Data: " . json_encode($appointments);
    }
    
    return "Not logged in or session expired";
});

// Test route for patient appointments
Route::get('/test-patient-appointments', function (Request $request) {
    $id = $request->session()->get('id');
    $Is_login = $request->session()->get('Is_login');
    
    if ($id && $Is_login == 'yes') {
        $today = date('Y-m-d');
        $appointments = DB::select("SELECT * FROM bookings WHERE userid = ? AND payment_status = 'paid' AND date >= ? ORDER BY date ASC", [$id, $today]);
        return "Patient ID: " . $id . "<br>Future Appointments: " . count($appointments) . "<br>Today: " . $today . "<br>Data: " . json_encode($appointments);
    }
    
    return "Not logged in or session expired";
});

// Test route to check if view exists
Route::get('/test-view', function () {
    if (view()->exists('page.patient.View_Appointments')) {
        return "View exists: page.patient.View_Appointments";
    } else {
        return "View does not exist: page.patient.View_Appointments";
    }
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
Route::get('/doctorAppointments', [PatientController::class, 'getappoinment']);


//show appoinment

Route::get('/viewAppoinmentPatien',[PatientController::class,'getappoinment']);
Route::post('/selectedAppointment',[PatientController::class,'selectAppoinment']);
Route::post('/getvalidappoinment',[PatientController::class,'selectVailAppoinment']);
Route::put('/updateAppoinment',[PatientController::class,'updateAppoinment']);
Route::delete('/deleteAppoinment',[PatientController::class,'deleteAppoinment']);


// user registation
Route::post('/Registationnewuser',[PatientController::class,'save']);
