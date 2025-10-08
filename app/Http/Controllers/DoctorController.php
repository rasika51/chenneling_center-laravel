<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function addnewdoctor(Request $request)
    {
        // Validate all required fields
        $request->validate([
            'doctorName' => 'required|string|max:255',
            'Specialization' => 'required|string|in:Dental,Heart,Other',
            'gender' => 'required|string|in:male,female',
            'phoneNumber' => 'required|string|max:20',
            'Email' => 'required|email|unique:doctor,email|max:255',
            'password' => 'required|string|min:6|max:255',
            'changingDate' => 'required|date',
            'changingTime' => 'required',
            'changingFees' => 'required|numeric|min:0'
        ], [
            'doctorName.required' => 'Doctor name is required',
            'Specialization.required' => 'Specialization is required',
            'Specialization.in' => 'Please select a valid specialization',
            'gender.required' => 'Gender is required',
            'gender.in' => 'Please select a valid gender',
            'phoneNumber.required' => 'Phone number is required',
            'Email.required' => 'Email is required',
            'Email.email' => 'Please enter a valid email address',
            'Email.unique' => 'This email is already registered',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
            'changingDate.required' => 'Changing date is required',
            'changingDate.date' => 'Please enter a valid date',
            'changingTime.required' => 'Changing time is required',
            'changingFees.required' => 'Fees is required',
            'changingFees.numeric' => 'Fees must be a number',
            'changingFees.min' => 'Fees must be greater than or equal to 0'
        ]);

        $doctorName = $request->input('doctorName');
        $Specialization = $request->input('Specialization');
        $gender = $request->input('gender');
        $phoneNumber = $request->input('phoneNumber');
        $email = $request->input('Email');
        $password = $request->input('password');
        $changingDate = $request->input('changingDate');
        $changingTime = $request->input('changingTime');
        $changingFees = $request->input('changingFees');

        $newdoctor = new Doctor([
            "Full_name" => $doctorName,
            "Specilization" => $Specialization,
            "Gender" => $gender,
            "contact_no" => $phoneNumber,
            "email" => $email,
            "passward" => bcrypt($password), // Encrypt password before saving
            "ChangingDate" => $changingDate,
            "ChangingTime" => $changingTime,
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
