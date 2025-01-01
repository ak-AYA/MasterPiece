<div class="container mt-3">
    <h3 class="card-title text-center mb-3">Profile Details</h3>
    <div class="row justify-content-center">
        <!-- Profile Information -->
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p class="card-text"><strong>Name:</strong> {{ $user->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p class="card-text"><strong>Phone:</strong> {{ $user->phone }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="card-text"><strong>Location:</strong> {{ $user->location }}</p>
                        </div>
                    </div>
                    <!-- Button to show/hide edit form -->
                    <div class="text-center">
                        <button id="editProfileBtn" class="btn btn-primary">Edit Profile</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Profile Form (Initially hidden) -->
        <div class="col-md-12" id="editProfileForm" style="display: none;">
            <h3 class="card-title text-center mb-3">Edit Profile</h3>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.user.updateProfile') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Email Field -->
                        <div class="row mb-3">
                            <label for="user_email" class="col-md-4 col-form-label">Email</label>
                            <div class="col-md-8">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="user_email" name="email" value="{{ old('email', $user->email) }}">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Phone Field -->
                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label">Phone</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                    name="phone" value="{{ old('phone', $user->phone) }}">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Location Field -->
                        <div class="row mb-3">
                            <label for="location" class="col-md-4 col-form-label">Location</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control @error('location') is-invalid @enderror"
                                    id="location" name="location" value="{{ old('location', $user->location) }}">
                                @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- New Password Field -->
                        <div class="row mb-3">
                            <label for="new_password" class="col-md-4 col-form-label">New
                                Password</label>
                            <div class="col-md-8">
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                    id="new_password" name="new_password">
                                @error('new_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="row mb-3">
                            <label for="confirm_password" class="col-md-4 col-form-label">Confirm
                                Password</label>
                            <div class="col-md-8">
                                <input type="password"
                                    class="form-control @error('confirm_password') is-invalid @enderror"
                                    id="confirm_password" name="confirm_password">
                                @error('confirm_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success w-25">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>






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


<!-- JavaScript to toggle edit form -->
<script>
document.getElementById('editProfileBtn').addEventListener('click', function() {
    const form = document.getElementById('editProfileForm');
    form.style.display = form.style.display === 'none' ? 'block' : 'none';
});
</script>