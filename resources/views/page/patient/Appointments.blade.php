@extends('layouts.patienlayout')

@section('page-contend-patien')
    <link rel="stylesheet" href="{{ asset('assets/css/doctor.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Header Section -->
                <div class="text-center mb-5">
                    <h2 class="text-primary mb-3">
                        <i class="fas fa-calendar-plus me-2"></i>Book New Appointment
                    </h2>
                    <p class="text-muted">Schedule your medical appointment with our qualified doctors</p>
                </div>

                <!-- Appointment Form -->
                <div class="card shadow-lg border-0">
                    <div class="card-body p-5">
                        <form method="POST" action="{{ url('addnewappoiment') }}" id="appointmentForm">
                            @csrf
                            
                            <!-- Patient Information -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h5 class="text-primary mb-3">
                                        <i class="fas fa-user me-2"></i>Patient Information
                                    </h5>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="patientName" class="form-label fw-bold">Patient Name *</label>
                                    <input type="text" name="patientName" id="patientName" 
                                           class="form-control form-control-lg" 
                                           placeholder="Enter patient name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="patientEmail" class="form-label fw-bold">Patient Email</label>
                                    <input type="email" name="patientEmail" id="patientEmail" 
                                           class="form-control form-control-lg" 
                                           placeholder="Enter patient email">
                                </div>
                            </div>

                            <!-- Doctor Selection -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h5 class="text-primary mb-3">
                                        <i class="fas fa-user-md me-2"></i>Doctor Selection
                                    </h5>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="Specialization" class="form-label fw-bold">Specialization *</label>
                                    <select name="Specialization" id="Specializationget" 
                                            class="form-select form-select-lg" 
                                            onchange="fetchDoctors()" required>
                                        <option value="">Choose Specialization</option>
                                        <option value="Cardiology">Cardiology</option>
                                        <option value="Dental">Dental</option>
                                        <option value="Neurology">Neurology</option>
                                        <option value="Orthopedics">Orthopedics</option>
                                        <option value="Pediatrics">Pediatrics</option>
                                        <option value="Dermatology">Dermatology</option>
                                        <option value="Gynecology">Gynecology</option>
                                        <option value="Psychiatry">Psychiatry</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="DoctorName" class="form-label fw-bold">Select Doctor *</label>
                                    <select name="doctorSelect" id="doctorSelect" 
                                            class="form-select form-select-lg" 
                                            onchange="fetchDoctorDetails()" required>
                                        <option value="">Choose a Doctor</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Doctor Information Display -->
                            <div id="doctorInfo" class="row mb-4" style="display: none;">
                                <div class="col-12">
                                    <div class="alert alert-info">
                                        <h6 class="mb-2"><i class="fas fa-info-circle me-2"></i>Doctor Information</h6>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <strong>Available Date:</strong> <span id="doctorDate"></span>
                                            </div>
                                            <div class="col-md-4">
                                                <strong>Available Time:</strong> <span id="doctorTime"></span>
                                            </div>
                                            <div class="col-md-4">
                                                <strong>Consultation Fee:</strong> <span id="doctorFees"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Appointment Details -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h5 class="text-primary mb-3">
                                        <i class="fas fa-calendar-alt me-2"></i>Appointment Details
                                    </h5>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label for="ChallengingDate" class="form-label fw-bold">Appointment Date *</label>
                                    <input type="date" id="ChallengingDate" name="ChallengingDate" 
                                           class="form-control form-control-lg" 
                                           min="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="ChallengingTime" class="form-label fw-bold">Appointment Time *</label>
                                    <input type="time" id="ChallengingTime" name="ChallengingTime" 
                                           class="form-control form-control-lg" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="ChangingFees" class="form-label fw-bold">Consultation Fee</label>
                                    <input type="text" id="ChangingFees" name="ChangingFees" 
                                           class="form-control form-control-lg" 
                                           placeholder="Fee will be auto-filled" readonly>
                                </div>
                            </div>

                            <!-- Additional Information -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label for="appointmentNotes" class="form-label fw-bold">Additional Notes</label>
                                    <textarea name="appointmentNotes" id="appointmentNotes" 
                                              class="form-control" rows="3" 
                                              placeholder="Any specific concerns or notes for the doctor..."></textarea>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-outline-secondary btn-lg" onclick="goBack()">
                                            <i class="fas fa-arrow-left me-2"></i>Back
                                        </button>
                                        <div>
                                            <button type="reset" class="btn btn-outline-warning btn-lg me-2">
                                                <i class="fas fa-undo me-2"></i>Clear
                                            </button>
                                            <button type="submit" class="btn btn-primary btn-lg">
                                                <i class="fas fa-calendar-check me-2"></i>Book Appointment
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Styles -->
    <style>
        .form-control, .form-select {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        
        .card {
            border-radius: 20px;
        }
        
        .btn {
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn:hover {
            transform: translateY(-2px);
        }
        
        .text-primary {
            color: #667eea !important;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
        }
        
        .alert-info {
            background: linear-gradient(135deg, #e3f2fd 0%, #f3e5f5 100%);
            border: none;
            border-radius: 15px;
        }
    </style>

    <script>
        function fetchDoctors() {
            var specialization = document.getElementById("Specializationget").value;
            var doctorSelect = document.getElementById("doctorSelect");
            var doctorInfo = document.getElementById("doctorInfo");
            
            // Reset doctor selection
            doctorSelect.innerHTML = '<option value="">Choose a Doctor</option>';
            doctorInfo.style.display = 'none';
            
            if (!specialization) {
                return;
            }

            // Show loading state
            doctorSelect.innerHTML = '<option value="">Loading doctors...</option>';

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
                doctorSelect.innerHTML = '<option value="">Choose a Doctor</option>';
                
                if (data.doctors && data.doctors.length > 0) {
                    data.doctors.forEach(doctor => {
                        var option = document.createElement("option");
                        option.value = doctor.id;
                        option.textContent = doctor.Full_name + ' - ' + doctor.Specilization;
                        doctorSelect.appendChild(option);
                    });
                } else {
                    doctorSelect.innerHTML = '<option value="">No doctors available for this specialization</option>';
                }
            })
            .catch(error => {
                console.error('Error fetching doctors:', error);
                doctorSelect.innerHTML = '<option value="">Error loading doctors</option>';
            });
        }

        function fetchDoctorDetails() {
            var doctorId = document.getElementById("doctorSelect").value;
            var doctorInfo = document.getElementById("doctorInfo");
            
            if (!doctorId) {
                doctorInfo.style.display = 'none';
                return;
            }

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
                if (data.doctors && data.doctors.length > 0) {
                    var doctor = data.doctors[0];
                    
                    // Update doctor information display
                    document.getElementById("doctorDate").textContent = doctor.ChangingDate || 'Not specified';
                    document.getElementById("doctorTime").textContent = doctor.ChangingTime || 'Not specified';
                    document.getElementById("doctorFees").textContent = doctor.Fees ? '$' + doctor.Fees : 'Not specified';
                    
                    // Auto-fill form fields
                    document.getElementById("ChallengingDate").value = doctor.ChangingDate || '';
                    document.getElementById("ChallengingTime").value = doctor.ChangingTime || '';
                    document.getElementById("ChangingFees").value = doctor.Fees || '';
                    
                    // Show doctor information
                    doctorInfo.style.display = 'block';
                }
            })
            .catch(error => {
                console.error('Error fetching doctor details:', error);
            });
        }

        function goBack() {
            window.history.back();
        }

        // Set minimum date to today
        document.addEventListener('DOMContentLoaded', function() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById("ChallengingDate").setAttribute('min', today);
        });
    </script>
@endsection