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
        @foreach($bookings as $booking)
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

<!-- إضافة الباجينيشن -->
<div class="d-flex justify-content-center">
    {{ $bookings->links() }}
</div>


        @if($completedBookings->isNotEmpty())
        <h5 class="mt-4">Leave a Review for Completed Bookings</h5>
        <form action="{{ route('user.reviews.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="booking_id" class="form-label">Select Booking</label>
                <select class="form-select" name="booking_id" id="booking_id" required>
                    @foreach($completedBookings as $booking)
                    <option value="{{ $booking->id }}">{{ $booking->service->name }} | {{ $booking->date }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="stars" class="form-label">Rating</label>
                <div id="stars" class="star-rating">
                    <i class="fa fa-star" data-index="1"></i>
                    <i class="fa fa-star" data-index="2"></i>
                    <i class="fa fa-star" data-index="3"></i>
                    <i class="fa fa-star" data-index="4"></i>
                    <i class="fa fa-star" data-index="5"></i>
                </div>
                <input type="hidden" name="stars" id="stars-input" required>
            </div>

            <div class="mb-3">
                <label for="text" class="form-label">Review</label>
                <textarea name="text" id="text" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit Review</button>
        </form>
        @endif
    </div>
</div>

<script>
    // Get all the stars
    const stars = document.querySelectorAll('#stars i');
    const starsInput = document.getElementById('stars-input');

    // Add click event to each star
    stars.forEach(star => {
        star.addEventListener('click', function() {
            let rating = this.getAttribute('data-index');
            setRating(rating);
        });
    });

    // Function to set the rating and update the star colors
    function setRating(rating) {
        stars.forEach(star => {
            if (star.getAttribute('data-index') <= rating) {
                star.classList.remove('bi-star');
                star.classList.add('bi-star-fill');
            } else {
                star.classList.remove('bi-star-fill');
                star.classList.add('bi-star');
            }
        });
        starsInput.value = rating; // Set the value in the hidden input
    }
</script>

<style>
    .star-rating i {
        font-size: 2rem;
        cursor: pointer;
        color: #d3d3d3; /* Gray color for empty stars */
    }

    .star-rating i.bi-star-fill {
        color: #EE8E1E; /* Yellow color for filled stars */
    }
</style>