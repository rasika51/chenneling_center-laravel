
@extends('layouts.adminlayout')

@section('Adminpage-content')


    <link rel="stylesheet" href="{{ asset('assets/css/appoinment_details.css') }}">
    <div id="appointment-container">

        <h3 class="mb-5">View Appoinment Details</h3>
        <!-- <label for="datetime-picker" class="lb">Select Date and Time:</label>
        <input type="datetime-local" id="datetime-picker"> -->

        <div id="table-container">
            <table id="appointment-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Patient Name</th>
                        <th>Doctor Specialization</th>
                        <th>Doctor Name</th>
                        <th>Channeling Date</th>
                        <th>Arrived Time</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>Cardiology</td>
                        <td>Dr. Smith</td>
                        <td>2023-11-26</td>
                        <td>10:30 AM</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>John Doe</td>
                        <td>Cardiology</td>
                        <td>Dr. Smith</td>
                        <td>2023-11-26</td>
                        <td>10:30 AM</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
