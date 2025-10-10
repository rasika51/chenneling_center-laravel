@extends('layouts.doctor')
@section('doctor-content')
    @if ($id and $Is_login == 'yes')
        <div class="container-fluid" style="padding: 2rem;">
            <div class="row">
                <div class="col-12">
                    <h2 class="mb-4">Doctor Dashboard</h2>
                    <div class="card">
                        <div class="card-header">
                            <h4>Welcome, Doctor!</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Today's Appointments</h5>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Patient Name</th>
                                                    <th>Time</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="3" class="text-center">No appointments scheduled for today</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5>Quick Actions</h5>
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary" type="button">View All Appointments</button>
                                        <button class="btn btn-success" type="button">Add Patient Notes</button>
                                        <button class="btn btn-info" type="button">Update Schedule</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <script>
            window.location.href = '/Login';
        </script>
    @endif
@endsection
