
<div class="col-md-12">
    <div class="card shadow rounded-4 p-4">
        <h5>Services</h5>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addServiceModal">Add
            New Service</button>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Service Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Duration (hours)</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($provider->services as $service)
                <tr>
                    <td>{{ $service->name }}</td>
                    <td>
                        <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                            data-bs-target="#viewDescriptionModal{{ $service->id }}">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                    <td>{{ $service->category->name }}</td>
                    <td>{{ $service->duration }} </td>
                    <td>JD {{ number_format($service->price, 2) }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                            data-bs-target="#editServiceModal{{ $service->id }}">
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



<!-- View Description Modal -->

@foreach ($services as $service)
<div class="modal fade" id="viewDescriptionModal{{ $service->id }}" tabindex="-1"
    aria-labelledby="viewDescriptionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewDescriptionModalLabel">Service Description</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Service Name: <br>{{ $service->name }}</p>
                <hr>
                <p>Category: <br>{{ $service->category->name }}</p>
                <hr>
                <p>Description: <br>{{ $service->description }}</p>
                <hr>
                <p>Duration: <br>{{ $service->duration }} </p>
                <hr>
                <p>Price: <br>Jd {{ number_format($service->price, 2) }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Add Service Modal -->
<div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addServiceModalLabel">Add New Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addServiceForm" method="POST" action="{{ route('provider.provider.addService') }}">
                @csrf
                <div class="modal-body">
                    <!-- Provider ID -->
                    <div class="mb-3" hidden>
                        <label for="provider_id" class="form-label">Provider ID</label>
                        <input type="text" class="form-control" id="provider_id" name="provider_id"
                            value="{{ Auth::id() }}" readonly>
                    </div>

                    <!-- Service Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Service Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            required>
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Category -->
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" id="category_id" class="form-select" required>
                            <option value="" disabled selected>Select a Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"
                            required>{{ old('description') }}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Service Image -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Service Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>

                    <!-- Duration -->
                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration (hours)</label>
                        <input type="text" class="form-control" id="duration" name="duration"
                            value="{{ old('duration') }}" required>
                        @error('duration')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price"
                            value="{{ old('price') }}" required>
                        @error('price')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>



                    <!-- Status -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Service</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Service Modal -->
<div class="modal fade" id="editServiceModal{{ $service->id }}" tabindex="-1" aria-labelledby="editServiceModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editServiceModalLabel">Edit Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('provider.provider.updateService', $service->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Service Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $service->name }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"
                            required>{{ $service->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $service->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration (hours)</label>
                        <input type="number" class="form-control" id="duration" name="duration"
                            value="{{ $service->duration }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ $service->price }}"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
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

