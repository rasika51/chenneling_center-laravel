@extends('layouts.patienlayout')

@section('page-contend-patien')
    <link rel="stylesheet" href="{{ asset('assets/css/doctor.css') }}">

    <form method="POST" action="{{ url('addnewappoiment') }}">
        @csrf
        <div class="form-container">
            <h3 class="mb-5">Add New Appointment</h3>

            <div class="form-group">
                <label for="patientName">Patient Name</label>
                <input type="text" name="patientName" placeholder="Enter the Patient Name"
                    class="form-control bg-light border-0" required>
            </div>

            <div class="form-group">
                <label for="Specialization">Specialization</label>
                <select name="Specialization" id="Specializationget" class="form-control bg-light border-0" onchange="fetchDoctors()">
                    <option value="">Choose Specialization</option>
                    <option value="dental">Dental</option>
                    <option value="heart">Heart</option>
                    <option value="sociology">Sociology</option>
                    <option value="neurology">Neurology</option>
                    <option value="orthopedics">Orthopedics</option>
                </select>
            </div>

            <div class="form-group">
                <label for="DoctorName">Doctor Name</label>
                <select name="doctorSelect" id="doctorSelect" class="form-control bg-light border-0" onchange="fetchDoctorDetails()">
                    <option value="">Choose a Doctor</option>
                    <option value="dental">Dr.Rasika Wedaarachchi</option>
                    <option value="heart">Dr. Raveen Hewage</option>
                    <option value="sociology">Dr. Piyumi Wathsala</option>
                </select>
            </div>

            <div class="form-group">
                <label for="ChallengingDate">Challenging Date</label>
                <input type="date" id="ChallengingDate" name="ChallengingDate" class="form-control bg-light border-0">
            </div>

            <div class="form-group">
                <label for="ChallengingTime">Channeling Time</label>
                <input type="time" id="ChallengingTime" name="ChallengingTime" class="form-control bg-light border-0">
            </div>

            <div class="form-group">
                <label for="ChangingFees">Channeling Fees</label>
                <input type="text" id="ChangingFees" name="ChangingFees" placeholder="Changing Fees"
                    class="form-control bg-light border-0">
            </div>

            <div class="button-container">
                <button type="button" class="btn btn-primary" onclick="goBack()"> Back</button>
                <button type="submit" class="btn btn-primary"> Save</button>
                <button type="reset" class="btn btn-primary"> Clear</button>
            </div>
    </form>

    <script>
        function fetchDoctors() {
            var specialization = document.getElementById("Specializationget").value;
            if (!specialization) {
                document.getElementById("doctorSelect").innerHTML = '<option value="">Select a Doctor</option>';
                return;
            }

            fetch('/selecteddoctors', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ selectedSpecialization: specialization })
            })
            .then(response => response.json())
            .then(data => {
                var doctorSelect = document.getElementById("doctorSelect");
                doctorSelect.innerHTML = '<option value="">Select a Doctor</option>';
                
                if (data.doctors.length > 0) {
                    data.doctors.forEach(doctor => {
                        var option = document.createElement("option");
                        option.value = doctor.id;
                        option.textContent = doctor.Full_name;
                        doctorSelect.appendChild(option);
                    });
                } else {
                    doctorSelect.innerHTML = '<option value="">No Doctors Available</option>';
                }
            })
            .catch(error => console.error('Error fetching doctors:', error));
        }

        function fetchDoctorDetails() {
            var doctorId = document.getElementById("doctorSelect").value;
            if (!doctorId) return;

            fetch('/selecteddoctorsname', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ selectedDoctor: doctorId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.doctors.length > 0) {
                    var doctor = data.doctors[0];
                    document.getElementById("ChallengingDate").value = doctor.ChangingDate || '';
                    document.getElementById("ChallengingTime").value = doctor.ChangingTime || '';
                    document.getElementById("ChangingFees").value = doctor.Fees || '';
                }
            })
            .catch(error => console.error('Error fetching doctor details:', error));
        }

        function goBack() {
            window.history.back();
        }
    </script>

@endsection
