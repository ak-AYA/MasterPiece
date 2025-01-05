@extends('website.main')
@section('title', 'User Profile')
@section('content')

<div class="container mt-5 pt-4">
    <div class="row mt-5 pt-4 mb-5">
        <!-- Sidebar -->
        <div class="col-md-3 ">
            <div class="card shadow rounded-4 p-4">
                <h4 class="text-center">User Dashboard</h4>
                <div class="text-center mt-4">
                    <div class="rounded-circle d-flex justify-content-center align-items-center text-white mx-auto mb-3"
                        style="width: 100px; height: 100px; background-color: #007bff; font-size: 36px;">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <h5 class="text-muted">{{ $user->name }}</h5>
                    <p class="text-muted">User</p>
                    <hr>
                </div>
                <div class="myaccount-tab-menu nav flex-column" role="tablist">
                    <a href="#profile-details-user" class="nav-link active" data-bs-toggle="tab"><i
                            class="fa fa-user-circle"></i> Profile Details</a>
                    <a href="#bookings-user" class="nav-link" data-bs-toggle="tab"><i class="fa fa-calendar"></i>
                        Bookings</a>
                    <a href="#reviews-user" class="nav-link" data-bs-toggle="tab"><i class="fa fa-star"></i> Reviews</a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <div class="card p-3 border">
                <div class="tab-content" id="userDashboardContent">
                    <!-- Profile Details Tab -->
                    <div class="tab-pane fade show active" id="profile-details-user" role="tabpanel">
                        @include('website.sections.providerSections.profileDetailsUser')
                    </div>

                    <!-- Bookings Tab -->
                    <div class="tab-pane fade" id="bookings-user" role="tabpanel">
                        @include('website.sections.providerSections.bookingsUser')
                    </div>

                    <!-- Reviews Tab -->
                    <div class="tab-pane fade" id="reviews-user" role="tabpanel">
                        @include('website.sections.providerSections.reviewsUser')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection