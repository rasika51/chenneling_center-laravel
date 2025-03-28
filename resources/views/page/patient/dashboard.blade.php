@extends('layouts.patienlayout')
@section('page-contend-patien')
    @if ($id and $Is_login == 'yes')
        <section>
            <div class="row">
                <!-- <h2 class="section-heading">r</h2> -->
                <h2 class="mb-5">Life Care Channeling Center</h2>
            </div>
            <div class="row">
                <div class="column">
                    <div class="card">
                        <div class="icon-wrapper">
                            <i class="fas fa-stethoscope"></i>
                        </div>
                        <h3>Medical Checkup</h3>
                        <p>
                            Comprehensive health examinations and consultations.
                        </p>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <div class="icon-wrapper">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <h3>Cardiology Services</h3>
                        <p>
                            Heart health assessments, diagnostics, and treatments.
                        </p>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <div class="icon-wrapper">
                            <i class="fas fa-tooth"></i>
                        </div>
                        <h3>Dental Care</h3>
                        <p>
                            Professional dental services for oral health.
                        </p>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <div class="icon-wrapper">
                            <i class="fas fa-wheelchair"></i>
                        </div>
                        <h3>Rehabilitation</h3>
                        <p>
                            Rehabilitation therapies for physical recovery.
                        </p>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <div class="icon-wrapper">
                            <i class="fas fa-syringe"></i>
                        </div>
                        <h3>Vaccination Services</h3>
                        <p>
                            Immunizations and vaccine administration.
                        </p>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <div class="icon-wrapper">
                            <i class="fas fa-pills"></i>
                        </div>
                        <h3>Pharmacy Services</h3>
                        <p>
                            Medication dispensing and pharmaceutical care.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    @else
        <script>
            window.location.href = '/Login';
        </script>
    @endif
@endsection
