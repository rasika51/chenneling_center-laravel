@extends('layouts.patienlayout')
@section('page-contend-patien')
    <link rel="stylesheet" href="{{ asset('assets/css/appoinment_details.css') }}">
    <div id="appointment-container">

        <h3 class="mb-5">All Appointment Details</h3>
        <!-- <label for="datetime-picker" class="lb">Select Date and Time:</label>
                                                    <input type="datetime-local" id="datetime-picker"> -->
        <div class="col-lg-12">
            <div class="bg-white text-center rounded p-5">
                <h1 class="mb-4">View Appointment</h1>
                <form>
                    <div class="row g-3">
                        <div class="col-12">
                            <select class="form-select bg-light border-0" style="height: 55px;" id="appointment"
                                onchange="change()">
                                <option selected>Choose Appoinment</option>

                                @foreach ($getpaymentdoctors as $getpaymentdoctor)
                                    <option value="{{ $getpaymentdoctor->id }}">{{ $getpaymentdoctor->patient_name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="col-12 col-sm-6">
                            <input type="text" class="form-control bg-light border-0" placeholder="Your Name"
                                id='name' style="height: 55px;" readonly>
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="email" class="form-control bg-light border-0" placeholder="Your Email"
                                id='email' id="email" style="height: 55px;" readonly>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="date" id="date" data-target-input="nearest">
                                <input type="text" class="form-control bg-light border-0 datetimepicker-input"
                                    id="dateenter" placeholder="Date" data-target="#date" data-toggle="datetimepicker"
                                    style="height: 55px;" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="time" id="time" data-target-input="nearest">
                                <input type="text" class="form-control bg-light border-0 datetimepicker-input"
                                    placeholder="Time" data-target="#time" data-toggle="datetimepicker" id="timeenter"
                                    style="height: 55px;" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 bg-light" style="display: flex;">
                            <div class="btn-primary w-50 py-3 col-12 col-sm-6">You Number</div>
                            <div class="w-50 py-3" id="yourposition">1</div>

                        </div>
                        <div class="col-12 col-sm-6 bg-light" style="display: flex;">
                            <div class="btn-primary w-50 py-3 col-12 col-sm-6">Now going on</div>
                            <div class="w-50 py-3" id="allpotion">12</div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="table-container">
            <table id="appointment-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Patient Name</th>

                    </tr>
                </thead>
                <tbody id="table-body">
                    <tr class="bg-light">
                        <td>1</td>
                        <td>Name</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Name</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function change() {

            var selectvalue = document.getElementById("appointment").value;
            var selectedOptionText = document.getElementById("appointment").options[document.getElementById("appointment")
                .selectedIndex].textContent;

            var formData = new FormData();
            formData.append('selectedappointment', selectvalue);;

            fetch('/getvalidappoinment', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                        console.log(data);

                        var appointment = data.appointment;
                        var userdata = data.userdata;
                        var Allappoinment = data.Allappoinment;
                        console.log(Allappoinment);

                        document.getElementById("dateenter").value = appointment[0].date;
                        document.getElementById("timeenter").value = appointment[0].time;

                        document.getElementById("name").value = userdata[0].Full_name;
                        document.getElementById("email").value = userdata[0].email;

                        var position = findRowPosition(Allappoinment, selectedOptionText);
                        document.getElementById("yourposition").textContent = position;
                        document.getElementById("allpotion").textContent = Allappoinment.length;
                        // addRowsToTable(Allappoinment);
                    }

                )
                .catch(error => {
                        document.getElementById("dateenter").value = '';
                        document.getElementById("timeenter").value = '';

                        document.getElementById("name").value = '';
                        document.getElementById("email").value = '';

                        document.getElementById('table-body').innerHTML = '';
                    }

                );

        }
        var tableBody = document.getElementById('table-body');

        function addRowsToTable(data) {
            // Clear existing rows
            tableBody.innerHTML = '';
            var number = 1;
            data.forEach(function(appointment, index) {

                var row = tableBody.insertRow(index);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);

                cell1.textContent = number;
                cell2.textContent = appointment.patient_name;
                number++;
            });

        }

        function findRowPosition(data, condition) {
            const name = condition.replace(/\s+/g, '');
console.log(name);
            for (var i = 0; i < data.length; i++) {
                const test = data[i].patient_name.replace(/\s+/g, '');
                console.log(test);
                if (test === name) {

                    addRowsToTable(data);
                    console.log(i+1);
                    return (i + 1);
                }
            }
            return -1;
        }
    </script>
@endsection
