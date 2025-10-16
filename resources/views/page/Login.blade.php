@extends('layouts.layout1')

@section('page-content')
    <!-- Contact Start -->
    <div class="container-fluid mb-5 "style="padding-top: 14rem !important;padding-bottom: 3rem !important;">
        <div class="container">
            <div class="row justify-content-center position-relative" style="margin-top: -200px; z-index: 1;">
                <div class="col-lg-8">
                    <div class="bg-white boddyofconetend rounded p-5 m-5 mb-0">
                        <!-- Error Messages -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ url('logindata') }}">
                            @csrf
                            <div class="row g-3">

                                <div class="col-12">
                                    <select class="form-control bg-light border-0" style="height: 55px;" name='role' required>
                                        <option value="">Select Role</option>
                                        <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>Admin</option>
                                        <option value="2" {{ old('role') == '2' ? 'selected' : '' }}>Patient</option>
                                        <option value="3" {{ old('role') == '3' ? 'selected' : '' }}>Doctor</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <input type="email" class="form-control bg-light border-0" placeholder="Email"
                                        name="email" value="{{ old('email') }}" style="height: 55px;" required>
                                </div>
                                <div class="col-12">
                                    <input type="password" class="form-control bg-light border-0" placeholder="Password"
                                        name="password" style="height: 55px;" required>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
