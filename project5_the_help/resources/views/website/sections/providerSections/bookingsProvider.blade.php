<div class="col-md-12">
    <div class="card shadow rounded-4 p-4">
        <h5>Bookings</h5>
        <div class="table-container mt-3">
            <table id="bookingsTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Service</th>
                        <th>Payment</th>
                        <th>Total Price</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $booking->user->name ?? 'No user' }}</td>
                        <td>{{ $booking->service->name ?? 'No service' }}</td>
                        <td>{{ $booking->payment->name ?? 'No payment' }}</td>
                        <td>{{ $booking->total_price }}</td>
                        <td>{{ $booking->date }}</td>
                        <td>
                            <form action="{{ route('provider.provider.updateBookingStatus', $booking->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="form-select-booking" onchange="this.form.submit()" {{ $booking->status === 'completed' || $booking->status === 'cancelled' ? 'disabled' : '' }}>
                                    <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="completed" {{ $booking->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
// JavaScript to handle status change via dropdown
document.querySelectorAll('.status-dropdown').forEach(dropdown => {
    dropdown.addEventListener('change', function() {
        const bookingId = this.dataset.bookingId;
        const newStatus = this.value;

        // Send AJAX request to update the status in the database
        fetch(`/update-booking-status/${bookingId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    status: newStatus
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Booking status updated successfully!');
                } else {
                    alert('Failed to update booking status.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
});
</script>
<script>
document.querySelectorAll('.form-select-booking').forEach(select => {
    select.addEventListener('change', function() {
        if (confirm('Are you sure you want to change the booking status?')) {
            this.form.submit();
        } else {
            this.value = this.getAttribute('data-original'); // إعادة القيمة الأصلية إذا ألغى
        }
    });
});
</script>


<!-- SweetAlert Script for Success -->
@if(session('success'))
<script>
Swal.fire({
    title: 'Success!',
    text: '{{ session('
    success ') }}',
    icon: 'success',
    confirmButtonText: 'Ok'
});
</script>
@endif