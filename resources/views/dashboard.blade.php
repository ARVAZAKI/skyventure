@extends('layouts')
@section('content')
<link rel="stylesheet" href="assets/vendors/iconly/bold.css">

<div class="page-content">
    <section class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="col-12 col-lg-9">
            <div class="row">
                <!-- Tenants Card -->
                <div class="col-6 col-lg-6 mb-4">
                    <a href="{{route('tenant.index')}}" class="card-link">
                        <div class="card clickable-card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon purple">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Tenants</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
                <!-- News Card -->
                <div class="col-6 col-lg-6 mb-4">
                    <a href="{{route('news.index')}}" class="card-link">
                        <div class="card clickable-card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">News</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Events Card -->
                <div class="col-6 col-lg-6 mb-4">
                    <a href="{{route('event.index')}}" class="card-link">
                        <div class="card clickable-card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon green">
                                            <i class="iconly-boldCalendar"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Events</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Facilities Card -->
                <div class="col-6 col-lg-6 mb-4">
                    <a href="{{route('facility.index')}}" class="card-link">
                        <div class="card clickable-card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon red">
                                            <i class="iconly-boldBookmark"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Facilities</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-lg-6 mb-4">
                    <a href="{{route('document.index')}}" class="card-link">
                        <div class="card clickable-card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon red">
                                            <i class="iconly-boldDocument"></i>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Document</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @if (Auth::user()->role == 'superadmin')
                <div class="col-6 col-lg-6 mb-4">
                    <a href="{{route('account.index')}}" class="card-link">
                        <div class="card clickable-card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon red">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Akun</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </section>
</div>

<script src="assets/js/pages/dashboard.js"></script>
@endsection
