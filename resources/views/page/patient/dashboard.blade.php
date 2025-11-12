@extends('layouts.patienlayout')
@section('page-contend-patien')
    @if ($id and $Is_login == 'yes')
        <!-- Hero Section -->
        <div class="hero-section bg-gradient-primary text-white py-5 mb-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h1 class="display-4 fw-bold mb-3">Welcome to Life Care Channeling Center</h1>
                        <p class="lead mb-4">Your health is our priority. Access quality healthcare services with ease.</p>
                        <div class="d-flex gap-3">
                            <a href="/AddAppoinment" class="btn btn-light btn-lg">
                                <i class="fas fa-plus me-2"></i>Book Appointment
                            </a>
                            <a href="/viewAppoinmentPatien" class="btn btn-outline-light btn-lg">
                                <i class="fas fa-calendar-check me-2"></i>View Appointments
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center">
                        <i class="fas fa-user-md fa-5x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- Services Section -->
            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="text-center mb-5">Our Medical Services</h2>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="service-card card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="service-icon mb-3">
                                <i class="fas fa-stethoscope fa-3x text-primary"></i>
                            </div>
                            <h5 class="card-title">Medical Checkup</h5>
                            <p class="card-text text-muted">Comprehensive health examinations and consultations with our experienced doctors.</p>
                            <a href="/AddAppoinment" class="btn btn-outline-primary">Book Now</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="service-card card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="service-icon mb-3">
                                <i class="fas fa-heartbeat fa-3x text-danger"></i>
                            </div>
                            <h5 class="card-title">Cardiology Services</h5>
                            <p class="card-text text-muted">Heart health assessments, diagnostics, and treatments by specialist cardiologists.</p>
                            <a href="/AddAppoinment" class="btn btn-outline-primary">Book Now</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="service-card card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="service-icon mb-3">
                                <i class="fas fa-tooth fa-3x text-info"></i>
                            </div>
                            <h5 class="card-title">Dental Care</h5>
                            <p class="card-text text-muted">Professional dental services for oral health and hygiene maintenance.</p>
                            <a href="/AddAppoinment" class="btn btn-outline-primary">Book Now</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="service-card card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="service-icon mb-3">
                                <i class="fas fa-wheelchair fa-3x text-success"></i>
                            </div>
                            <h5 class="card-title">Rehabilitation</h5>
                            <p class="card-text text-muted">Rehabilitation therapies for physical recovery and mobility improvement.</p>
                            <a href="/AddAppoinment" class="btn btn-outline-primary">Book Now</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="service-card card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="service-icon mb-3">
                                <i class="fas fa-syringe fa-3x text-warning"></i>
                            </div>
                            <h5 class="card-title">Vaccination Services</h5>
                            <p class="card-text text-muted">Immunizations and vaccine administration for all age groups.</p>
                            <a href="/AddAppoinment" class="btn btn-outline-primary">Book Now</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="service-card card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="service-icon mb-3">
                                <i class="fas fa-pills fa-3x text-secondary"></i>
                            </div>
                            <h5 class="card-title">Pharmacy Services</h5>
                            <p class="card-text text-muted">Medication dispensing and pharmaceutical care services.</p>
                            <a href="/AddAppoinment" class="btn btn-outline-primary">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions Section -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card bg-light border-0">
                        <div class="card-body p-4">
                            <h3 class="text-center mb-4">Quick Actions</h3>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="d-grid">
                                        <a href="/AddAppoinment" class="btn btn-primary btn-lg">
                                            <i class="fas fa-plus me-2"></i>Book New Appointment
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-grid">
                                        <a href="/viewAppoinmentPatien" class="btn btn-success btn-lg">
                                            <i class="fas fa-calendar-check me-2"></i>View My Appointments
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-grid">
                                        <a href="/patient" class="btn btn-info btn-lg">
                                            <i class="fas fa-user me-2"></i>My Profile
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Emergency Contact Section -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card border-warning">
                        <div class="card-body text-center">
                            <h4 class="text-warning mb-3">
                                <i class="fas fa-exclamation-triangle me-2"></i>Emergency Contact
                            </h4>
                            <p class="mb-3">For medical emergencies, please contact us immediately</p>
                            <div class="d-flex justify-content-center gap-4">
                                <div>
                                    <i class="fas fa-phone text-danger me-2"></i>
                                    <strong>Emergency: +1 (555) 123-4567</strong>
                                </div>
                                <div>
                                    <i class="fas fa-clock text-info me-2"></i>
                                    <strong>24/7 Available</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Custom Styles -->
        <style>
            .bg-gradient-primary {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            }
            
            .service-card {
                transition: all 0.3s ease;
                border-radius: 15px;
            }
            
            .service-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 15px 35px rgba(0,0,0,0.1) !important;
            }
            
            .service-icon {
                transition: all 0.3s ease;
            }
            
            .service-card:hover .service-icon {
                transform: scale(1.1);
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
            
            .hero-section {
                border-radius: 0 0 30px 30px;
            }
        </style>
    @else
        <script>
            window.location.href = '/Login';
        </script>
    @endif
@endsection