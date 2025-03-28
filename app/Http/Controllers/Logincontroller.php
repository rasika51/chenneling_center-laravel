<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Logincontroller extends Controller
{
    public function handleLoginData(Request $request)
    {
        $request->session()->put('Is_login', 'no');
        $email = $request->input('email');
        $password = $request->input('password');
        $role = $request->input('role');
    
        if ($role == '1') {
            $login = Admin::where('email', '=', $email)->first();
            $goto = 'adminDashboard';
    
        } elseif ($role == '2') {
            $login = Patient::where('email', '=', $email)->first();
            $goto = 'patien';
    
        } elseif ($role == '3') {
            $login = Doctor::where('email', '=', $email)->first();
            $goto = 'Doctor';
        }
    
        if ($login && Hash::check($password, $login->password)) {
            $id = $login->id;
            $request->session()->put('id', $id);
            $request->session()->put('Is_login', 'yes');
    
            return redirect("/successfull?successMessage=Login%20successful&goto={$goto}&check=success&msg=success");
        } else {
            return redirect("/successfull?successMessage=Try%20Again&goto=Login&check=error&msg=Login%20Incorrect");
        }
    
    }


    public function dashboardcheckingISlogin(Request $request){


        $id = $request->session()->get('id');
        $Is_login = $request->session()->get('Is_login');

        $count = DB::select('SELECT COUNT(id) as count FROM doctor')[0]->count;
        $speclistcount = DB::select('SELECT COUNT(id) as speclistcount FROM doctor_speclist')[0]->speclistcount;

        return view('page.admin.admin', compact('id', 'Is_login','count','speclistcount'));

    }

    public function DoctoringISlogin(Request $request){

        $id = $request->session()->get('id');
        $Is_login = $request->session()->get('Is_login');
        return view('page.doctor.dashboard', compact('id', 'Is_login'));

    }

    public function patieningISlogin(Request $request){

        $id = $request->session()->get('id');
        $Is_login = $request->session()->get('Is_login');
        return view('page.patient.dashboard', compact('id', 'Is_login'));

    }

}
