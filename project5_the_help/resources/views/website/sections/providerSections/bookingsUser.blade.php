<!-- Bookings Tab -->
<div class="col-md-12">
    <div class="card shadow rounded-4 p-4">
        <h5>Upcoming & Past Bookings</h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Service</th>
                    <th>Payment</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($completedBookings as $booking)
                <tr>
                    <td>{{ $booking->date }}</td>
                    <td>{{ $booking->time }}</td>
                    <td>
                        @if($booking->status == 'pending')
                        <span class="badge bg-secondary">Pending</span>
                        @elseif($booking->status == 'confirmed')
                        <span class="badge bg-warning">Confirmed</span>
                        @elseif($booking->status == 'completed')
                        <span class="badge bg-success">Completed</span>
                        @elseif($booking->status == 'cancelled')
                        <span class="badge bg-danger">Cancelled</span>
                        @endif
                    </td>
                    <td>{{ $booking->service->name }}</td>
                    <td>{{ $booking->payment->name }}</td>
                    <td>{{ $booking->total_price }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if($completedBookings->isNotEmpty())
        <h5 class="mt-4">Leave a Review for Completed Bookings</h5>
        <form action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="booking_id" class="form-label">Select Booking</label>
                <select class="form-select" name="booking_id" id="booking_id" required>
                    @foreach($completedBookings as $booking)
                    <option value="{{ $booking->id }}">{{ $booking->service->name }} - {{ $booking->date }}
                        ({{ $booking->total_price }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="stars" class="form-label">Rating</label>
                <input type="number" name="stars" id="stars" class="form-control" min="1" max="5" required>
            </div>

            <div class="mb-3">
                <label for="text" class="form-label">Review</label>
                <textarea name="text" id="text" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Upload Image (Optional)</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Submit Review</button>
        </form>
        @endif
    </div>
</div>