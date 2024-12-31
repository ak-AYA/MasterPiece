

@extends('website.main')
@section('title', 'Checkout')
@section('content')



<form action="{{ route('user.booking.payment') }}" method="POST">
    @csrf
    <h5 class="mt-4">Payment Information</h5>

    <!-- User Information Section -->
    <div class="mb-3 row align-items-center">
        <!-- Payment Methods -->
        <div class="col-lg-6 col-md-6 col-12 mb-3">
            <label for="paymentMethod" class="form-label">Choose Payment Method</label>
            <select id="paymentMethod" name="payment_method" class="form-select" required>
                <option value="" disabled selected>Select Payment Method</option>
                <option value="Cash">Cash</option>
                <option value="Visa">Visa</option>
            </select>
        </div>
    </div>

    <button class="btn btn-primary mt-4 w-50 text-center">Pay and Confirm</button>
</form>


@endsection
