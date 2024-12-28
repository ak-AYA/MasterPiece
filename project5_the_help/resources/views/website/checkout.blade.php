@extends('website.main')
@section('title', 'Checkout')
@section('content')

<style>
    .checkout-container {
        display: flex;
        gap: 20px;
        margin: 50px auto;
        max-width: 1200px;
    }

    .checkout-details,
    .checkout-summary {
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .checkout-details {
        flex: 7; /* 70% */
    }

    .checkout-summary {
        flex: 3; /* 30% */
    }

    .summary-header {
        font-weight: bold;
        border-bottom: 2px solid #ddd;
        margin-bottom: 15px;
        padding-bottom: 10px;
    }

    .summary-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .total-price {
        font-size: 1.5rem;
        font-weight: bold;
        color: #007bff;
    }

    .btn-primary {
        width: 100%;
    }

    .payment-methods {
        display: flex;
        gap: 10px;
        flex-direction: column; /* Stack payment methods vertically */
    }

    .payment-method {
        border: 1px solid #ddd;
        padding: 15px;
        text-align: center;
        border-radius: 8px;
    }

    .payment-method input {
        margin-top: 10px;
    }

    .readonly-input {
        background-color: #f0f0f0;
        border: 1px solid #ddd;
        padding: 10px;
        width: 100%;
        margin-bottom: 10px;
    }
</style>

<section id="checkout" class="pt-2 mt-4">
    <div class="container mt-5">
        <h2 class="widget-title text-uppercase border-bottom mb-3 mt-5 text-center">Checkout</h2>
        <div class="checkout-container row">
            <!-- Booking Summary Section (Left Side - 70%) -->
            <div class="col-lg-8 col-md-8 col-12 checkout-details">
                <h4 class="summary-header pb-4">Booking Summary</h4>
                <div class="summary-item">
                    <label for="date">Date:</label>
                    <input type="text" class="readonly-input" id="date" value="{{ $booking->date }}" readonly>
                </div>
                <div class="summary-item">
                    <label for="location">Location:</label>
                    <input type="text" class="readonly-input" id="location" value="{{ $user->location }}" readonly>
                </div>
                <div class="summary-item">
                    <label for="userName">Name:</label>
                    <input type="text" class="readonly-input" id="userName" value="{{ $user->name }}" readonly>
                </div>
                <div class="summary-item">
                    <label for="providerName">Provider:</label>
                    <input type="text" class="readonly-input" id="providerName" value="{{ $booking->provider->name }}" readonly>
                </div>
                <div class="summary-item">
                    <label for="serviceName">Service:</label>
                    <input type="text" class="readonly-input" id="serviceName" value="{{ $booking->service->name }}" readonly>
                </div>
                <div class="summary-item">
                    <label for="categoryName">Category:</label>
                    <input type="text" class="readonly-input" id="categoryName" value="{{ $booking->service->category->name }}" readonly>
                </div>
                <div class="summary-item">
                    <label for="totalPrice">Total Price:</label>
                    <input type="text" class="readonly-input" id="totalPrice" value="JD {{ number_format($booking->service->price, 2) }}" readonly>
                </div>
            </div>

            <!-- Payment Methods Section (Right Side - 30%) -->
            <div class="col-lg-4 col-md-4 col-12 checkout-summary">
                <h5 class="mt-4">Payment Methods</h5>
                <div class="payment-methods">
                    <div class="payment-method">
                        <label for="creditCard">Credit Card</label>
                        <input type="radio" id="creditCard" name="paymentMethod" value="creditCard">
                    </div>
                    <div class="payment-method">
                        <label for="paypal">PayPal</label>
                        <input type="radio" id="paypal" name="paymentMethod" value="paypal">
                    </div>
                    <div class="payment-method">
                        <label for="bankTransfer">Bank Transfer</label>
                        <input type="radio" id="bankTransfer" name="paymentMethod" value="bankTransfer">
                    </div>
                </div>
                <button class="btn btn-primary mt-4">Pay Now</button>
            </div>
        </div>
    </div>
</section>


@endsection
