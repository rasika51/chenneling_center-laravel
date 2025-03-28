@extends('layouts.adminlayout')

@section('Adminpage-content')
    <link rel="stylesheet" href="{{ asset('assets/css/doctor.css') }}">
    <form method="POST" action="{{ url('addnewdoctordata') }}">
        @csrf
        <div class="form-container">

            <h3 class="mb-5">Add new Doctors</h3>
            {{-- <div class="form-group">
                <label for="doctorId">Doctor Id</label>
                <input type="text" name="doctorId" id="doctorId" placeholder="Enter the doctor Id"
                    class="form-control bg-light border-0">

            </div> --}}
            <div class="form-group">
                <label for="doctorName">Doctor Name</label>
                <input type="text" name="doctorName" placeholder="Enter Doctor Name"
                    class="form-control bg-light border-0">
            </div>
            <div class="form-group">
                <label for="specialization">Specialization</label>
                {{-- <input type="text" name="specialization" placeholder="What Specialization"
                    class="form-control bg-light border-0"> --}}

                    <select name="Specialization" class="form-control bg-light border-0">

                        @foreach($specializations as $specialization)
                            <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                        @endforeach

                    </select>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" class="form-control bg-light border-0">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input type="text" name="phoneNumber" placeholder="Enter the Phone number"
                    class="form-control bg-light border-0">

            </div>
            {{-- <div class="form-group">
                <label for="channelRoom">Channel Room number</label>
                <input type="text" name="channelRoom" placeholder="Enter Channel Room number"
                    class="form-control bg-light border-0">
            </div> --}}
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="text" name="Email" placeholder="Enter Email" class="form-control bg-light border-0">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter Password" class="form-control bg-light border-0">
            </div>
            <div class="form-group">
                <label for="changingDate">Changing Date</label>
                <input type="date" name="changingDate" class="form-control bg-light border-0">
            </div>
            <div class="form-group">
                <label for="changingTime">Changing Time</label>
                <input type="time" name="changingTime" class="form-control bg-light border-0">
            </div>
            <div class="form-group">
                <label for="changingFees">Changing Fees</label>
                <input type="text" name="changingFees" placeholder="Changing Fees" class="form-control bg-light border-0">
            </div>

            <div class="button-container">
                <button type="button" class="btn btn-primary">Back</button>
                <button type="submit" class="btn btn-primary"> Save</button>
                <button type="button" class="btn btn-primary"> Clear</button>
            </div>
        </div>
    </form>
@endsection
