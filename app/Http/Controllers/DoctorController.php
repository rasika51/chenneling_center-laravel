<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function addnewdoctor(Request $request)
    {

        $doctorName = $request->input('doctorName');
        $Specialization = $request->input('Specialization');
        $gender = $request->input('gender');
        $phoneNumber = $request->input('phoneNumber');
        $email = $request->input('Email');
        $password = Hash::make($request->input('password')); // Hashing the password
        // $changingDate = $request->input('changingDate');
        // $changingTime = $request->input('changingTime');
        $changingFees = $request->input('changingFees');

        $newdoctor = new Doctor([
            "Full_name" => $doctorName,
            "Specilization" => $Specialization,
            "Gender" => $gender,
            "contact_no" => $phoneNumber,
            "email" => $email,
            "password" => $password, // Storing hashed password
            // "ChangingDate" => $changingDate,
            // "ChangingTime" => $changingTime,
            "Fees" => $changingFees,
        ]);

        $newdoctor->save();
        $goto = 'Login';
        return redirect("/successfull?successMessage=Added%20successful&goto={$goto}&check=success&msg=success");
    }

    public function getSpecialization()
    {
        $specializations = DB::select('SELECT * FROM doctor_speclist');
        return view('page.admin.add_doctor', ['specializations' => $specializations]);
    }

    public function getSpecializationfor()
    {
        $specializations = DB::select('SELECT * FROM doctor_speclist');
        return view('page.patient.Appointments', ['specializations' => $specializations]);
    }
    public function getalldoctor()
    {
        $doctors = DB::select('SELECT * FROM doctor');
        return view('page.admin.view_doctor', ['doctors' => $doctors]);
    }

    public function selecteddoctors(Request $request)
    {
        $selectvalue = $request->input('selectedSpecialization'); // Corrected input key

        $doctors = DB::select("SELECT * FROM doctor WHERE Specilization = '$selectvalue'"); // Corrected query syntax

        return response()->json(['doctors' => $doctors]);
    }
    public function selecteddoctorsname(Request $request)
    {
        $selectvalue = $request->input('selectedDoctor');
        $doctors = DB::select("SELECT * FROM doctor WHERE id = '$selectvalue'"); // Corrected query syntax
        return response()->json(['doctors' => $doctors]);
    }

}
