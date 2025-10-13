<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    protected $patient;
    public function __construct()
    {
        $this->patient = new Patient();
    }

    public function save(request $request)
    {
        // Validate all required fields
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email|max:255',
            'password' => 'required|string|min:6|max:255',
            'gender' => 'required|in:male,female',
            'dob' => 'required|date|before:today',
            'contactnum' => 'required|string|max:20',
            'addresss' => 'required|string|max:500',
            'marital_status' => 'required|in:single,married',
            'allergies' => 'required|in:yes,no',
            'Dieases' => 'required|string|max:1000'
        ], [
            'fullname.required' => 'Full name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'This email is already registered',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
            'gender.required' => 'Please select your gender',
            'gender.in' => 'Please select a valid gender',
            'dob.required' => 'Date of birth is required',
            'dob.date' => 'Please enter a valid date',
            'dob.before' => 'Date of birth must be before today',
            'contactnum.required' => 'Contact number is required',
            'addresss.required' => 'Address is required',
            'marital_status.required' => 'Please select marital status',
            'marital_status.in' => 'Please select a valid marital status',
            'allergies.required' => 'Please select if you have allergies',
            'allergies.in' => 'Please select a valid option for allergies',
            'Dieases.required' => 'Please mention any diseases you have'
        ]);

        $fullname = $request->input('fullname');
        $email = $request->input('email');
        $password = $request->input('password');
        $gender = $request->input('gender');

        $dob = $request->input('dob');
        $contactnum = $request->input('contactnum');
        $addresss = $request->input('addresss');

        $maritalStatus = $request->input('marital_status');
        $allergies = $request->input('allergies');
        $Dieases = $request->input('Dieases');

        // Convert values to proper format for database
        $maritalStatusFormatted = $maritalStatus === 'married' ? 'Married' : 'Single';
        $allergiesFormatted = $allergies === 'yes' ? 'Yes' : 'No';

        $newPatient = new Patient([
            'full_name' => $fullname,  
            'email' => $email,
            'gender' => $gender, 
            'dob' => $dob,
            'contact_no' => $contactnum,
            'address' => $addresss,
            'marital_status' => $maritalStatusFormatted,
            'allergic_medicine' => $allergiesFormatted, 
            'diseases' => $Dieases,
            'password' => bcrypt($password), // Encrypt password before saving!
        ]);
        $newPatient->save();
        $goto = 'patient';
        return redirect("/successfull?successMessage=Registration%20successful&goto={$goto}&check=success&msg=success");
    }

    public function passthepayment(request $request)
    {
        $id = $request->input('id');
        $getthedoctorid = DB::select("SELECT doctorid FROM bookings WHERE id = ?", [$id]);

        $doctorid = $getthedoctorid[0]->doctorid;

        $getpaymentdoctor = DB::select("SELECT Fees FROM doctor WHERE id = ?", [$doctorid]);

        $payment = $getpaymentdoctor[0]->Fees;
        return view('page.patient.payment', ['payment' => $payment]);

    }

   

    public function getappoinment(request $request)
    {
        $id = $request->session()->get('id');
        $Is_login = $request->session()->get('Is_login');
        $role = $request->session()->get('role', 'patient'); // Default to patient

        // Debug information
        \Log::info('PatientController::getappoinment called', [
            'id' => $id,
            'Is_login' => $Is_login,
            'role' => $role
        ]);

        // Check if this is a doctor by checking if the ID exists in doctor table
        $isDoctor = DB::select("SELECT id FROM doctor WHERE id = ?", [$id]);
        
        if (!empty($isDoctor) || $role === 'doctor') {
            // For doctors, get their future appointments only
            $today = date('Y-m-d');
            $getpaymentdoctors = DB::select("SELECT * FROM bookings WHERE doctorid = ? AND payment_status = 'paid' AND date >= ? ORDER BY date ASC, time ASC", [$id, $today]);
            return view('page.doctor.appointments', ['getpaymentdoctors' => $getpaymentdoctors, 'id' => $id, 'Is_login' => $Is_login]);
        } else {
            // For patients, get their future appointments only
            $today = date('Y-m-d');
            $getpaymentdoctors = DB::select("SELECT * FROM bookings WHERE userid = ? AND payment_status = 'paid' AND date >= ? ORDER BY date ASC, time ASC", [$id, $today]);
            
            // If no appointments found, pass empty array
            if (empty($getpaymentdoctors)) {
                $getpaymentdoctors = [];
            }
            
            return view('page.patient.View_Appointments', [
                'getpaymentdoctors' => $getpaymentdoctors,
                'id' => $id,
                'Is_login' => $Is_login
            ]);
        }
    }

    public function selectAppoinment(request $request)
    {
        $selectvalue = $request->input('selectedappointment');
        $appointment = DB::select("SELECT * FROM bookings WHERE id = ?", [$selectvalue]);

        if (!empty($appointment)) {
            $appointmentData = $appointment[0];
            $userid = $appointmentData->userid;
            $doctorid = $appointmentData->doctorid;

            // Use patients table instead of user table
            $userdata = DB::select("SELECT * FROM patients WHERE id = ?", [$userid]);
            $allAppoiment = DB::table('bookings')
                ->where('doctorid', $doctorid)
                ->orderBy('add_time', 'asc')
                ->get();
        } else {
            $userdata = [];
            $allAppoiment = [];
        }

        return response()->json(['appointment' => $appointment, 'userdata' => $userdata, 'Allappoinment' => $allAppoiment]);
    }

}
