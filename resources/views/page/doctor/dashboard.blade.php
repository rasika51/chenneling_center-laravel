@extends('layouts.doctor')
@section('doctor-content')
    @if ($id and $Is_login == 'yes')
        <div id="appointment-container">

            <h3 class="mb-5">Patient Details</h3>
            <label for="datetime-picker" class="lb">Select Date and Time:</label>
            <input type="datetime-local" id="datetime-picker">

            <div id="table-container">
                <table id="appointment-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Patient Name</th>
                            <th>Gender</th>
                            <th>Date of Birth</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        <td>patient.no </td>
                        <td>pame</td>
                        <td>patder</td>
                        <td>dob</td>
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <script>
            window.location.href = '/Login';
        </script>
    @endif
@endsection
