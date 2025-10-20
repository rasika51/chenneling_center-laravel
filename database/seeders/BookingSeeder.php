<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\booking;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First, create a sample patient if none exists
        $patient = Patient::first();
        if (!$patient) {
            $patient = Patient::create([
                'full_name' => 'John Doe',
                'email' => 'john@example.com',
                'gender' => 'Male',
                'dob' => '1990-01-01',
                'contact_no' => '1234567890',
                'address' => '123 Main St',
                'marital_status' => 'Single',
                'allergic_medicine' => 'No',
                'password' => bcrypt('password123')
            ]);
        }

        // Create a sample doctor if none exists
        $doctor = Doctor::first();
        if (!$doctor) {
            $doctor = Doctor::create([
                'Full_name' => 'Dr. Smith',
                'email' => 'doctor@example.com',
                'Gender' => 'Male',
                'contact_no' => '0987654321',
                'Specilization' => 'Cardiology',
                'password' => bcrypt('password123'),
                'ChangingDate' => '2025-01-01',
                'ChangingTime' => '09:00:00',
                'Fees' => 100.00
            ]);
        }

        // Create sample future bookings
        $futureDate1 = date('Y-m-d', strtotime('+7 days')); // 7 days from now
        $futureDate2 = date('Y-m-d', strtotime('+14 days')); // 14 days from now
        $futureDate3 = date('Y-m-d', strtotime('+21 days')); // 21 days from now

        booking::create([
            'userid' => $patient->id,
            'doctorid' => $doctor->id,
            'date' => $futureDate1,
            'time' => '10:00:00',
            'marital_status' => 'Single',
            'payment_status' => 'paid',
            'status' => 'active',
            'patient_name' => $patient->full_name
        ]);

        booking::create([
            'userid' => $patient->id,
            'doctorid' => $doctor->id,
            'date' => $futureDate2,
            'time' => '14:30:00',
            'marital_status' => 'Single',
            'payment_status' => 'paid',
            'status' => 'active',
            'patient_name' => $patient->full_name
        ]);

        booking::create([
            'userid' => $patient->id,
            'doctorid' => $doctor->id,
            'date' => $futureDate3,
            'time' => '09:15:00',
            'marital_status' => 'Single',
            'payment_status' => 'paid',
            'status' => 'active',
            'patient_name' => $patient->full_name
        ]);
    }
}