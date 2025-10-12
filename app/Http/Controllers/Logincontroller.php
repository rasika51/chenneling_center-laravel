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
        // Clear any existing session
        $request->session()->flush();
        $request->session()->put('Is_login', 'no');
        
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
            'role' => 'required|in:1,2,3'
        ], [
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email address',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
            'role.required' => 'Please select a role',
            'role.in' => 'Please select a valid role'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
        $role = $request->input('role');
        $login = null;
        $goto = '';
    
        // Find user based on role
        if ($role == '1') {
            $login = Admin::where('email', '=', $email)->first();
            $goto = 'adminDashboard';
        } elseif ($role == '2') {
            $login = Patient::where('email', '=', $email)->first();
            $goto = 'patient';
        } elseif ($role == '3') {
            $login = Doctor::where('email', '=', $email)->first();
            $goto = 'Doctor';
        }
    
        // Check if user exists and password is correct
        if ($login && Hash::check($password, $login->password)) {
            $id = $login->id;
            $request->session()->put('id', $id);
            $request->session()->put('Is_login', 'yes');
            
            // Set role in session
            if ($role == '1') {
                $request->session()->put('role', 'admin');
            } elseif ($role == '2') {
                $request->session()->put('role', 'patient');
            } elseif ($role == '3') {
                $request->session()->put('role', 'doctor');
            }

            return redirect("/successfull?successMessage=Login%20successful&goto={$goto}&check=success&msg=success");
        } else {
            // Return to login with error message
            return redirect()->back()->withErrors([
                'login' => 'Invalid email, password, or role. Please try again.'
            ])->withInput($request->except('password'));
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
