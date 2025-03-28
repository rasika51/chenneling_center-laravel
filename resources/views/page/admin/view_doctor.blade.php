


@extends('layouts.adminlayout')

@section('Adminpage-content')

    <link rel="stylesheet" href="{{ asset('assets/css/appoinment_details.css') }}">


    <div id="appointment-container">

        <h3 class="mb-5">View Doctors Details</h3>

        <div id="table-container">
            <table id="appointment-table">
                <thead>
                    <tr>
                        <tr>
                            <th>#</th>
                            <th>Doctor Name</th>
                            <th>Specialization</th>
                            <th>Gender</th>
                            <th>Phone NO</th>
                            <th>Channeling Dates</th>
                            <th>Channeling Time</th>
                        </tr>
                    </tr>
                </thead>
                <tbody id="table-body">

                @foreach($doctors as $doctor)

                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$doctor->Full_name}}</td>


                        @php
                            $data = DB::select("SELECT * FROM doctor_speclist WHERE id = {$doctor->Specilization}");
                        @endphp

                        <td>{{ $data ? $data[0]->name : 'N/A' }}</td>

                        <td>{{$doctor->Gender}}</td>
                        <td>{{$doctor->contact_no}}</td>
                        <td>{{$doctor->ChangingDate}}</td>
                        <td>{{ \Carbon\Carbon::parse($doctor->ChangingTime)->format('h:i A') }}</td>

                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
