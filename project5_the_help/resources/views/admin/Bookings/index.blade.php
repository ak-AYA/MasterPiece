@extends('layouts.master')
@section('title', 'Bookings Management')
@section('content')

<!-- Include DataTables CSS and JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
.page-header {
    background-color: #f8f9fa;
    padding: 20px;
    border-radius: 10px;
}

.table-container {
    padding: 20px;
}

.table {
    padding: 20px 0;
}

.table th,
.table td {
    border: 1px solid #DEE2E6;
    padding: 10px;
    vertical-align: middle;
    text-align: center;
}

.table-hover tbody tr:hover {
    background-color: #f1f5f9;
}

.table thead th {
    font-weight: bold;
    color: #24282C;
    background-color: transparent;
}

.icon-btn {
    color: #495057;
    cursor: pointer;
    font-size: 16px;
    margin: 0 5px;
    transition: color 0.2s ease-in-out;
}

.icon-btn:hover {
    color: #007bff;
}

.modal-body .form-label {
    font-size: 14px;
    margin-bottom: 4px;
}

.modal-body .form-control {
    height: 32px;
    font-size: 14px;
    padding: 4px 8px;
}

.modal-header,
.modal-footer {
    padding: 8px 16px;
}

.table img {
    max-width: 80px;
    height: 60px;
    border-radius: 5px;
}
</style>

<div class="container mt-4">
    <div class="page-header d-flex justify-content-between align-items-center bg-light p-3 mb-4 rounded">
        <h2>Bookings Management</h2>
        <!-- <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addBookingModal">
            Add New Booking
        </button> -->
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-container mt-3">
        <table id="bookingsTable" class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Customer Name</th>
                    <th>Service</th>
                    <th>Payment</th>
                    <th>Total Price</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $booking->user->name ?? 'No user' }}</td> <!-- Customer Name (User) -->
                    <td>{{ $booking->service->name ?? 'No service' }}</td> <!-- Service Name -->
                    <td>{{ $booking->payment->name ?? 'No payment' }}</td> <!-- Payment Name -->
                    <td>{{ $booking->total_price }}</td> <!-- Total Price -->
                    <td>{{ $booking->date }}</td> <!-- Booking Date -->
                    <td>{{ $booking->time }}</td> <!-- Booking Date -->
                    <td>
                        @if($booking->status == 'pending')
                            <i class="fas fa-hourglass-half text-warning"></i> 
                        @elseif($booking->status == 'confirmed')
                            <i class="far fa-circle-check text-primary"></i> 
                        @elseif($booking->status == 'completed')
                            <i class="fas fa-circle-check text-success"></i> 
                        @elseif($booking->status == 'cancelled')
                            <i class="fas fa-times-circle text-danger"></i> 
                        @endif
                    </td>

                    <td>
                        <i class="fas fa-edit icon-btn" data-bs-toggle="modal" data-bs-target="#editBookingModal"
                            data-id="{{ $booking->id }}" data-customer_name="{{ $booking->user->name }}"
                            data-service_id="{{ $booking->service_id }}" data-payment_id="{{ $booking->payment_id }}"
                            data-discount_id="{{ $booking->discount_id }}"
                            data-total_price="{{ $booking->total_price }}"
                            data-booking_date="{{ $booking->booking_date }}" data-booking_time="{{ $booking->time }}" data-status="{{ $booking->status }}">
                        </i>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add Booking Modal -->
<div class="modal fade" id="addBookingModal" tabindex="-1" aria-labelledby="addBookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBookingModalLabel">Add New Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('bookings.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="customer_name" class="form-label">Customer Name</label>
                        <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                    </div>
                    <div class="mb-2">
                        <label for="service_id" class="form-label">Service</label>
                        <select class="form-select" id="service_id" name="service_id" required>
                            <option value="" disabled selected>Select Service</option>
                            @foreach($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="payment_id" class="form-label">Payment</label>
                        <select class="form-select" id="payment_id" name="payment_id" required>
                            <option value="" disabled selected>Select Payment</option>
                            @foreach($payments as $payment)
                            <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="discount_id" class="form-label">Discount</label>
                        <select class="form-select" id="discount_id" name="discount_id" required>
                            <option value="" disabled selected>Select Discount</option>
                            @foreach($discounts as $discount)
                            <option value="{{ $discount->id }}">{{ $discount->amount }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="total_price" class="form-label">Total Price</label>
                        <input type="number" class="form-control" id="total_price" name="total_price" required>
                    </div>
                    <div class="mb-2">
                        <label for="booking_date" class="form-label">Booking Date</label>
                        <input type="date" class="form-control" id="booking_date" name="booking_date" required>
                    </div>
                    <div class="mb-2">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="pending">Pending</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Booking Modal -->
<div class="modal fade" id="editBookingModal" tabindex="-1" aria-labelledby="editBookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBookingModalLabel">Edit Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('bookings.update') }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <!-- Hidden input for booking ID -->
                    <input type="hidden" id="edit_booking_id" name="id">

                    <!-- Customer Name (readonly) -->
                    <div class="mb-2">
                        <label for="edit_customer_name" class="form-label">Customer Name</label>
                        <input type="text" class="form-control" id="edit_customer_name" name="customer_name" readonly>
                    </div>

                    <!-- Service (readonly) -->
                    <div class="mb-2">
                        <label for="edit_service_id" class="form-label">Service</label>
                        <select class="form-select" id="edit_service_id" name="service_id" readonly>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Total Price (readonly) -->
                    <div class="mb-2">
                        <label for="edit_total_price" class="form-label">Total Price</label>
                        <input type="number" class="form-control" id="edit_total_price" name="total_price" readonly>
                    </div>

                    <!-- Booking Date (readonly) -->
                    <div class="mb-2" hidden>
                        <label for="edit_date" class="form-label">Booking Date</label>
                        <input type="date" class="form-control" id="edit_date" name="date" readonly>
                    </div>

                    <!-- Status (editable) -->
                    <div class="mb-2">
                        <label for="edit_status" class="form-label">Status</label>
                        <select class="form-select" id="edit_status" name="status" required>
                            <option value="pending">Pending</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>




<script>
$(document).ready(function() {
    $('#bookingsTable').DataTable({
        "ordering": false,
        "paging": true,
        "searching": true,
        "info": true,
    });

    // Fill the edit modal fields with the selected booking data
    $('#editBookingModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);

        var bookingId = button.data('id');
        var customerName = button.data('customer_name');
        var serviceId = button.data('service_id');
        var paymentId = button.data('payment_id');
        var discountId = button.data('discount_id');
        var totalPrice = button.data('total_price');
        var bookingDate = button.data('booking_date');
        var status = button.data('status');

        $('#edit_booking_id').val(bookingId);
        $('#edit_customer_name').val(customerName);
        $('#edit_service_id').val(serviceId);
        $('#edit_payment_id').val(paymentId);
        $('#edit_discount_id').val(discountId);
        $('#edit_total_price').val(totalPrice);
        $('#edit_booking_date').val(bookingDate);
        $('#edit_status').val(status);
    });

});
</script>

@endsection