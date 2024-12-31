@extends('website.main')
@section('title', 'User Profile')
@section('content')

<section id="user-profile" class="py-5">
    <div class="container py-5">
        <div class="row">
            <!-- Profile Information on the Left -->
            <div class="col-md-4">
                <div class="card shadow rounded-4 p-4">
                    <h3 class="text-center">User Profile</h3>
                    <div class="text-center mt-4">
                        <!-- Circle with User Initial -->
                        <div class="rounded-circle d-flex justify-content-center align-items-center text-white mx-auto mb-3"
                            style="width: 100px; height: 100px; background-color: #007bff; font-size: 36px;">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <h5 class="mt-3">{{ $user->name }}</h5>
                        <p class="text-muted">User</p>
                    </div>
                    <hr>
                    <h5>Personal Information</h5>
                    <ul class="list-unstyled">
                        <li><strong>Email:</strong> {{ $user->email }}</li>
                        <li><strong>Phone:</strong> {{ $user->phone }}</li>
                        <li><strong>Location:</strong> {{ $user->location }}</li>
                    </ul>
                    <!-- Edit Profile Button -->
                    <button class="btn btn-primary w-100 mt-3" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>
                </div>
            </div>

            <!-- Booking List Section on the Right -->
            <div class="col-md-8">
                <div class="card shadow rounded-4 p-4">
                    <h5>Upcoming & Past Bookings</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Service</th>
                                <th>Payment</th>
                                <th>Discount</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                            <tr>
                                <td>{{ $booking->date }}</td>
                                <td>
                                    @if($booking->status == 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                    @elseif($booking->status == 'confirmed')
                                    <span class="badge bg-success">Confirmed</span>
                                    @elseif($booking->status == 'completed')
                                    <span class="badge bg-warning">Completed</span>
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
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('user.user.updateProfile') }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Email Field -->
            <div class="mb-3">
                <label for="user_email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="user_email" name="email" value="{{ old('email', $user->email) }}">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Phone Field (Uneditable) -->
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
                @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Location Field -->
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location', $user->location) }}">
                @error('location')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- New Password Field -->
            <div class="mb-3">
                <label for="new_password" class="form-label">New Password</label>
                <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password">
                @error('new_password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password Field -->
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password" name="confirm_password">
                @error('confirm_password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- SweetAlert Script for Success -->
@if(session('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'Ok'
        });
    </script>
@endif
<script>
document.getElementById('editProfileBtn').addEventListener('click', function() {
    const form = document.getElementById('editProfileForm');
    form.classList.toggle('d-none');
});
</script>

@endsection
