@extends('layouts.doctor')

@section('doctor-content')
    @if ($id and $Is_login == 'yes')
        <div class="container-fluid" style="padding: 2rem;">
            <div class="row">
                <div class="col-12">
                    <h2 class="mb-4">Doctor Appointments</h2>
                    
                    @if(isset($getpaymentdoctors) && count($getpaymentdoctors) > 0)
                        <!-- Debug info -->
                        <div class="alert alert-info">
                            <strong>Debug:</strong> Found {{ count($getpaymentdoctors) }} appointments for doctor ID: {{ $id }}
                        </div>
                        
                        <div class="card">
                            <div class="card-header">
                                <h4>Today's Appointments</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Patient Name</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($getpaymentdoctors as $appointment)
                                                <tr>
                                                    <td>{{ $appointment->patient_name }}</td>
                                                    <td>{{ $appointment->date }}</td>
                                                    <td>{{ $appointment->time }}</td>
                                                    <td>
                                                        <span class="badge bg-success">{{ $appointment->status }}</span>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary">View Details</button>
                                                        <button class="btn btn-sm btn-success">Mark Complete</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card">
                            <div class="card-body text-center">
                                <h5>No Appointments Scheduled</h5>
                                <p class="text-muted">You don't have any appointments scheduled for today.</p>
                                <button class="btn btn-primary">View All Appointments</button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @else
        <script>
            window.location.href = '/Login';
        </script>
    @endif
@endsection