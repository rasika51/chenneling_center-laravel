<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\booking;
class AppoinmentController extends Controller
{
    public function addnewappoiment(Request $request){
        // dd($request);
        $patientName = $request->input('patientName');
        $doctorSelect = $request->input('doctorSelect');
        $ChallengingDate = $request->input('ChallengingDate');
        $ChallengingTime = $request->input('ChallengingTime');
        $Chengingfees = $request->input('Chengingfees');

        $newbooking = new booking([
            "userid" => $request->session()->get('id'),
            "doctorid" => $doctorSelect,
            "date" => $ChallengingDate,
            "time" => $ChallengingTime,
            "checKout" => '0',
            // "payment" => '0',
            "status" => '1',
            "patient_name"=>$patientName
        ]);

        $newbooking->save();
        $idnum = $newbooking->id;

    }
}
