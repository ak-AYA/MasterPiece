@extends('layouts.master')
@section('title', 'The Help')
@section('content')
<style>
    .custom-card {
    background-color: rgba(70, 130, 180, 0.7); /* Light blue with transparency */
    color: white; /* Make sure text is white for contrast */
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .custom-card:hover {
        background-color: rgba(70, 130, 180, 0.9); /* Slightly darker blue on hover */
    }

</style>
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <!-- <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol> -->
    <div class="row">
        <!-- Light Blue Card Design (Primary) -->
        <div class="col-xl-3 col-md-6">
            <div class="card custom-card mb-4 shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h5 class="card-title">Primary Card</h5>
                    <p class="card-text">This is a light blue primary card with transparency.</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="#" class="text-white stretched-link">View Details</a>
                </div>
            </div>
        </div>

        <!-- Warning Card (Optional for future use) -->
        <div class="col-xl-3 col-md-6">
            <div class="card custom-card mb-4 shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h5 class="card-title">Warning Card</h5>
                    <p class="card-text">A warning message card. Use this for urgent but less critical information.</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="#" class="text-white stretched-link">View Details</a>
                </div>
            </div>
        </div>

        <!-- Success Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card custom-card mb-4 shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h5 class="card-title">Success Card</h5>
                    <p class="card-text">This is a success card. Use it for successful actions and achievements.</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="#" class="text-white stretched-link">View Details</a>
                </div>
            </div>
        </div>

        <!-- Danger Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card custom-card mb-4 shadow-sm border-0 rounded-3">
                <div class="card-body">
                    <h5 class="card-title">Danger Card</h5>
                    <p class="card-text">Use this card to alert users of critical issues or important warnings.</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="#" class="text-white stretched-link">View Details</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
