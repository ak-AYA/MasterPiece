@extends('website.main')
@section('title', '÷nvoice')
@section('content')



<section id="invoice" class="pt-5 mt-5">
    <div class="container">
        <h2 class="widget-title text-uppercase border-bottom mb-4 text-center">Invoice</h2>
        <div class="card p-4 shadow-sm">
            <h4>Invoice Details</h4>
            <p>Booking ID: {{ $booking->id }}</p>
            <p>User Name: {{ $booking->user->name }}</p>
            <p>Service: {{ $booking->service->name }}</p>
            <p>Date: {{ $booking->date }}</p>
            <p>Time: {{ $booking->time }}</p>
            <p>Total Price: {{ $booking->total_price }}</p>
            <p>Payment Method: {{ $booking->payment->name }}</p>

        </div>
    </div>
</section>


@endsection