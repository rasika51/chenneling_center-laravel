
@extends('layouts.layout1')
<style>
body{
    overflow: hidden;
}
</style>
@section('page-content')
    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 mb-5 hero-header" style="height: 100vh;background: url('{{ asset('assets/image/hero.jpg') }}') top right no-repeat;">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5" style="border-color: rgba(256, 256, 256, .3) !important;">Welcome To Medinova</h5>
                    <h1 class="display-1 text-white mb-md-4">Life care Chanalling Center</h1>
                    <div class="pt-2">
                        <a href="/Registation" class="btn btn-light rounded-pill py-md-3 px-md-5 mx-2">New Registation</a>
                        <a href="/Login" class="btn btn-outline-light rounded-pill py-md-3 px-md-5 mx-2">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
