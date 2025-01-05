@extends('website.main')
@section('title', 'Provider Dashboard')

@section('content')

<div class="container mt-5 pt-4">
    <div class="row mt-5 pt-4 mb-5">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="card shadow rounded-4 p-4">
                <h4 class="text-center">Provider Dashboard</h4>
                <div class="text-center mt-4">
                    <div class="rounded-circle d-flex justify-content-center align-items-center text-white mx-auto mb-3"
                        style="width: 100px; height: 100px; background-color: #007bff; font-size: 36px;">
                        {{ strtoupper(substr($provider->name, 0, 1)) }}
                    </div>
                    <p class="text-muted">Provider</p>
                    <h4 class="text-muted">{{$provider-> name }}</h4>
                    <hr>
                </div>
                <div class="myaccount-tab-menu nav flex-column" role="tablist">
                    <a href="#profile-details" class="nav-link active" data-bs-toggle="tab"><i class="fa fa-user-circle"></i> Profile Details</a>
                    <a href="#servicesProvider" class="nav-link" data-bs-toggle="tab"><i class="fa fa-history"></i> Service History</a>
                    <a href="#bookingsProvider" class="nav-link" data-bs-toggle="tab"><i class="fa fa-calendar"></i> Bookings</a>
                    <a href="#reviewsProvider" class="nav-link" data-bs-toggle="tab"><i class="fa fa-star"></i> Reviews</a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <div class="card p-3 border">
                <div class="tab-content" id="providerDashboardContent">
                    <!-- Profile Details Tab -->
                    <div class="tab-pane fade show active" id="profile-details" role="tabpanel">
                        @include('website.sections.providerSections.profileDetails')
                    </div>

                    <!-- Service History Tab -->
                    <div class="tab-pane fade" id="servicesProvider" role="tabpanel">
                        @include('website.sections.providerSections.servicesProvider')
                    </div>

                    <!-- Bookings Tab -->
                    <div class="tab-pane fade" id="bookingsProvider" role="tabpanel">
                        @include('website.sections.providerSections.bookingsProvider')
                    </div>

                    <!-- Reviews Tab -->
                    <div class="tab-pane fade" id="reviewsProvider" role="tabpanel">
                        @include('website.sections.providerSections.reviewsProvider')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
