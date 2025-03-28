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
        // dd($request->all());

        $fullname = $request->input('fullname');
        $email = $request->input('email');
        $password = $request->input('password');
        $gender = $request->input('gender');


        $dob = $request->input('dob');
        $contactnum = $request->input('contactnum');
        $addresss = $request->input('addresss');

        $Marital_Married = $request->input('Marital_Married');

        $Allegics_yes = $request->input('Allegics_yes');

        $Dieases = $request->input('Dieases');

        $newPatient = new Patient([

        ]);

        $newPatient = new Patient([
            'full_name' => $fullname,  // Changed to lowercase
            'email' => $email,
            'gender' => $gender, 
            'dob' => $dob,
            'contact_no' => $contactnum,
            'address' => $addresss,
            'marital_status' => $Marital_Married ?? 'Single', // Default to 'Single'
            'allergic_medicine' => $Allegics_yes ?? 'No', // Default to 'None'
            'password' => bcrypt($password), // Encrypt password before saving!
        ]);
        $newPatient->save();
        $goto = 'adminDashboard';
        return redirect("/successfull?successMessage=Added%20successful&goto={$goto}&check=success&msg=success");
    }

    public function passthepayment(request $request)
    {
        $id = $request->input('id');
        $getthedoctorid = DB::select("SELECT doctorid FROM booking WHERE id = ?", [$id]);

        $doctorid = $getthedoctorid[0]->doctorid;

        $getpaymentdoctor = DB::select("SELECT Fees FROM doctor WHERE id = ?", [$doctorid]);

        $payment = $getpaymentdoctor[0]->Fees;
        return view('page.patient.payment', ['payment' => $payment]);

    }

    // public function paymentsave(request $request)
    // {
    //     // dd($request->all());

    //     $id = $request->input('user');

    //     $update = DB::update('update booking set payment = 1 where id = ?', [$id]);

    //     if ($update > 0) {

    //         $goto = 'viewAppoinmentPatien';
    //         return redirect("/successfull?successMessage=Added%20successful&goto={$goto}&check=success&msg=success");

    //     } else {
    //         $goto = 'viewAppoinmentPatien';
    //         return redirect("/successfull?successMessage=Try%20Again&goto={$goto}&check=error&msg=data%20Incorrect");

    //     }

    // }

    public function getappoinment(request $request)
    {
        $id = $request->session()->get('id');

        $getpaymentdoctors = DB::select("SELECT * FROM booking WHERE userid = ? AND payment = 1", [$id]);
        return view('page.patient.View_Appointments', ['getpaymentdoctors' => $getpaymentdoctors]);


    }

    public function selectAppoinment(request $request)
    {
        $selectvalue = $request->input('selectedappointment');
        $appointment = DB::select("SELECT * FROM booking WHERE id = '$selectvalue'");

        foreach ($appointment as $appointmentData) {

            $userid = $appointmentData->userid;
            $doctorid = $appointmentData->doctorid;

            $userdata = DB::select("SELECT * FROM user WHERE id = '$userid'");
            $allAppoiment = $allAppointments = DB::table('booking')
                ->where('doctorid', $doctorid)
                ->orderBy('add_time', 'asc')
                ->get();


        }

        return response()->json(['appointment' => $appointment, 'userdata' => $userdata, 'Allappoinment' => $allAppoiment]);

    }

    public function selectVailAppoinment(request $request)
    {
        $selectvalue = $request->input('selectedappointment');
        $appointment = DB::select("SELECT * FROM booking WHERE id = '$selectvalue' ");

        foreach ($appointment as $appointmentData) {

            $userid = $appointmentData->userid;
            $doctorid = $appointmentData->doctorid;

            $userdata = DB::select("SELECT * FROM user WHERE id = '$userid'");
            $allAppointments = DB::table('booking')
            ->where('doctorid', $doctorid)
            ->where('checkOut', '0')
            ->where('payment', '1')
            ->orderBy('add_time', 'asc')
            ->get();

        }

        return response()->json(['appointment' => $appointment, 'userdata' => $userdata, 'Allappoinment' => $allAppointments]);

    }
}
