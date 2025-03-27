@extends('layouts.layout1')

@section('page-content')
    <!-- Contact Start -->
    <div class="container-fluid mb-5 "style="padding-top: 14rem !important;padding-bottom: 3rem !important;">
        <div class="container">
            <div class="row justify-content-center position-relative" style="margin-top: -200px; z-index: 1;">
                <div class="col-lg-8">
                    <div class="bg-white boddyofconetend rounded p-5 m-5 mb-0">
                        <form method="POST" action="{{ url('logindata') }}">
                            @csrf
                            <div class="row g-3">

                                <div class="col-12">
                                    <select class="form-control bg-light border-0" style="height: 55px;" name='role'>
                                        <option value="1" selected>Select Role</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Patient</option>
                                        <option value="3">Doctor</option>
                                    </select>

                                </div>

                                <div class="col-12">
                                    <input type="email" class="form-control bg-light border-0" placeholder="Email"
                                        name="email" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input type="password" class="form-control bg-light border-0" placeholder="Password"
                                        name="password" style="height: 55px;">
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
