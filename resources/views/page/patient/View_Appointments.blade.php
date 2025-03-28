@extends('layouts.patienlayout')
@section('page-contend-patien')
    <link rel="stylesheet" href="{{ asset('assets/css/appoinment_details.css') }}">
    <div id="appointment-container">

        <h3 class="mb-5">Update Appointment</h3>

        <div class="col-lg-12">
            <div class="bg-white text-center rounded p-5">
                <h1 class="mb-4">View & Update Appointment</h1>
                <form method="POST" id="update-appointment-form">
                    @csrf
                    <div class="row g-3">
                    
                        <div class="col-12 col-sm-6">
                            <input type="text" class="form-control bg-light border-0" placeholder="Your Name"
                                id="name" style="height: 55px;" readonly>
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="email" class="form-control bg-light border-0" placeholder="Your Email"
                                id="email" style="height: 55px;" readonly>
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

                        <!-- Update Appointment Button -->
                        <div class="col-12 col-sm-6">
                            <button type="button" class="btn btn-warning w-100 py-3" onclick="updateAppointment()">Update Appointment</button>
                        </div>

                        <!-- Delete Appointment Button -->
                        <div class="col-12 col-sm-6">
                            <button type="button" class="btn btn-danger w-100 py-3" onclick="deleteAppointment()">Delete Appointment</button>
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
                    <!-- Data will be populated here dynamically -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function change() {
            var selectvalue = document.getElementById("appointment").value;
            var selectedOptionText = document.getElementById("appointment").options[document.getElementById("appointment").selectedIndex].textContent;

            var formData = new FormData();
            formData.append('selectedappointment', selectvalue);

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

                        document.getElementById("dateenter").value = appointment[0].date;
                        document.getElementById("timeenter").value = appointment[0].time;

                        document.getElementById("name").value = userdata[0].Full_name;
                        document.getElementById("email").value = userdata[0].email;

                        addRowsToTable(data.Allappoinment);
                    })
                .catch(error => {
                        document.getElementById("dateenter").value = '';
                        document.getElementById("timeenter").value = '';
                        document.getElementById("name").value = '';
                        document.getElementById("email").value = '';
                    });
        }

        function updateAppointment() {
            var selectvalue = document.getElementById("appointment").value;
            var date = document.getElementById("dateenter").value;
            var time = document.getElementById("timeenter").value;

            if (!date || !time) {
                alert("Please select date and time to update.");
                return;
            }

            var formData = new FormData();
            formData.append('appointment_id', selectvalue);
            formData.append('date', date);
            formData.append('time', time);

            fetch('/update-appointment', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                alert("Appointment updated successfully.");
                // Refresh or update the UI with new data
                change();
            })
            .catch(error => {
                alert("Failed to update the appointment.");
            });
        }

        function deleteAppointment() {
            var selectvalue = document.getElementById("appointment").value;

            if (confirm("Are you sure you want to delete this appointment?")) {
                var formData = new FormData();
                formData.append('appointment_id', selectvalue);

                fetch('/delete-appointment', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    alert("Appointment deleted successfully.");
                    // Refresh the page or update the UI
                    change();
                })
                .catch(error => {
                    alert("Failed to delete the appointment.");
                });
            }
        }

        function addRowsToTable(data) {
            var tableBody = document.getElementById('table-body');
            tableBody.innerHTML = '';
            var number = 1;
            data.forEach(function(appointment) {
                var row = tableBody.insertRow();
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);

                cell1.textContent = number;
                cell2.textContent = appointment.patient_name;
                number++;
            });
        }
    </script>
@endsection
