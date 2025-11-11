@extends('layouts.patienlayout')
@section('page-contend-patien')
    <link rel="stylesheet" href="{{ asset('assets/css/appoinment_details.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <!-- Header Section -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="text-primary mb-1"><i class="fas fa-calendar-check me-2"></i>My Upcoming Appointments</h2>
                        <p class="text-muted">Manage your future medical appointments</p>
                    </div>
                    <div>
                        <a href="/AddAppoinment" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Book New Appointment
                        </a>
                    </div>
                </div>

                @if(isset($getpaymentdoctors) && count($getpaymentdoctors) > 0)
                    <!-- Appointments List -->
                    <div class="row">
                        @foreach($getpaymentdoctors as $index => $appointment)
                            <div class="col-lg-6 col-xl-4 mb-4">
                                <div class="card appointment-card h-100 shadow-sm">
                                    <div class="card-header bg-gradient-primary text-white">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="mb-0">
                                                <i class="fas fa-calendar-alt me-2"></i>
                                                Appointment #{{ $index + 1 }}
                                            </h6>
                                            <span class="badge bg-light text-dark">
                                                {{ ucfirst($appointment->status) }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-user text-primary me-2"></i>
                                                    <div>
                                                        <small class="text-muted">Patient</small>
                                                        <div class="fw-bold">{{ $appointment->patient_name }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-clock text-success me-2"></i>
                                                    <div>
                                                        <small class="text-muted">Time</small>
                                                        <div class="fw-bold">{{ $appointment->time }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-calendar text-info me-2"></i>
                                                    <div>
                                                        <small class="text-muted">Date</small>
                                                        <div class="fw-bold">{{ $appointment->date }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-heart text-danger me-2"></i>
                                                    <div>
                                                        <small class="text-muted">Status</small>
                                                        <div class="fw-bold text-success">{{ ucfirst($appointment->status) }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-credit-card text-warning me-2"></i>
                                                    <div>
                                                        <small class="text-muted">Payment</small>
                                                        <div class="fw-bold text-success">{{ ucfirst($appointment->payment_status) }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-light">
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-outline-primary btn-sm flex-fill" onclick="viewAppointmentDetails({{ $appointment->id }})">
                                                <i class="fas fa-eye me-1"></i>View Details
                                            </button>
                                            <button class="btn btn-outline-success btn-sm flex-fill" onclick="updateAppointment({{ $appointment->id }})">
                                                <i class="fas fa-edit me-1"></i>Update
                                            </button>
                                            <button class="btn btn-outline-danger btn-sm flex-fill" onclick="cancelAppointment({{ $appointment->id }})">
                                                <i class="fas fa-times me-1"></i>Cancel
                                            </button>
                                        </div>
                        </div>
                        </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Summary Card -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <div class="row text-center">
                                        <div class="col-md-3">
                                            <div class="d-flex flex-column align-items-center">
                                                <i class="fas fa-calendar-check fa-2x text-primary mb-2"></i>
                                                <h5 class="mb-1">{{ count($getpaymentdoctors) }}</h5>
                                                <small class="text-muted">Total Appointments</small>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="d-flex flex-column align-items-center">
                                                <i class="fas fa-check-circle fa-2x text-success mb-2"></i>
                                                <h5 class="mb-1">{{ count(array_filter($getpaymentdoctors, fn($a) => $a->status === 'active')) }}</h5>
                                                <small class="text-muted">Active</small>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="d-flex flex-column align-items-center">
                                                <i class="fas fa-money-bill-wave fa-2x text-success mb-2"></i>
                                                <h5 class="mb-1">{{ count(array_filter($getpaymentdoctors, fn($a) => $a->payment_status === 'paid')) }}</h5>
                                                <small class="text-muted">Paid</small>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="d-flex flex-column align-items-center">
                                                <i class="fas fa-clock fa-2x text-warning mb-2"></i>
                                                <h5 class="mb-1">{{ count(array_filter($getpaymentdoctors, fn($a) => $a->status === 'pending')) }}</h5>
                                                <small class="text-muted">Pending</small>
                                            </div>
                                        </div>
                            </div>
                        </div>
                            </div>
                        </div>
                        </div>

                @else
                    <!-- No Appointments State -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body text-center py-5">
                                    <div class="mb-4">
                                        <i class="fas fa-calendar-times fa-5x text-muted"></i>
                                    </div>
                                    <h4 class="text-muted mb-3">No Upcoming Appointments</h4>
                                    <p class="text-muted mb-4">You don't have any future appointments scheduled yet.</p>
                                    <div class="d-flex justify-content-center gap-3">
                                        <a href="/AddAppoinment" class="btn btn-primary btn-lg">
                                            <i class="fas fa-plus me-2"></i>Book Your First Appointment
                                        </a>
                                        <a href="/patient" class="btn btn-outline-secondary btn-lg">
                                            <i class="fas fa-home me-2"></i>Back to Dashboard
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Custom Styles -->
    <style>
        .appointment-card {
            border: none;
            border-radius: 15px;
            transition: all 0.3s ease;
            overflow: hidden;
        }
        
        .appointment-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
        }
        
        .bg-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .card-header {
            border-bottom: none;
            border-radius: 15px 15px 0 0 !important;
        }
        
        .card-footer {
            border-top: 1px solid #e9ecef;
            border-radius: 0 0 15px 15px;
        }
        
        .btn {
            border-radius: 8px;
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
    </style>

    <!-- JavaScript for Actions -->
    <script>
        function viewAppointmentDetails(appointmentId) {
            // Implementation for viewing appointment details
            alert('Viewing appointment details for ID: ' + appointmentId);
        }
        
        function updateAppointment(appointmentId) {
            // Implementation for updating appointment
            alert('Updating appointment ID: ' + appointmentId);
        }
        
        function cancelAppointment(appointmentId) {
            if (confirm('Are you sure you want to cancel this appointment?')) {
                // Implementation for canceling appointment
                alert('Canceling appointment ID: ' + appointmentId);
            }
        }
    </script>
@endsection