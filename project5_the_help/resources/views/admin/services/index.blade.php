@extends('layouts.master')
@section('title', 'Services Management')
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
        object-fit: contain;
    }
</style>

<div class="container mt-4">
    <div class="page-header d-flex justify-content-between align-items-center bg-light p-3 mb-4 rounded">
        <h2>Service Management</h2>
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addServiceModal">
            Add New Service
        </button>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-container mt-3">
        <table id="servicesTable" class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Duration</th>
                    <th>Price</th>
                    <th>Provider</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $service->name }}</td>
                    <td>
                
                    <img src="{{ asset('assetts/images/services/' . $service->image) }}"
                        class="card-img-top rounded-top" alt="{{ $service->name }}"
                        style="height: 150px; object-fit: cover;">

    

                    </td>

                    <td>
                        <button class="showDescription"
                            data-description="{{ $service->description ?? 'No description available' }}"
                            data-name="{{ $service->name ?? 'No name available' }}"
                            data-time="{{ $service->created_at ?? 'No date available' }}">
                            <i class="fas fa-eye"></i> <!-- Eye icon -->
                        </button>

                    </td>
                    <td>{{ $service->duration }}</td>
                    <td>{{ $service->price }} JD</td>
                    <td>{{ $service->provider->name ?? 'No provider' }}</td>
                    <td>{{ $service->category->name ?? 'No category' }}</td>
                    <td>
                        @if($service->status)
                        <i class="fas fa-check-circle text-success"></i>
                        @else
                        <i class="fas fa-times-circle text-warning"></i>
                        @endif
                    </td>
                    <td>
                        <i class="fas fa-edit icon-btn" type="button" data-bs-toggle="modal"
                            data-bs-target="#editServiceModal" data-id="{{ $service->id }}"
                            data-name="{{ $service->name }}" data-description="{{ $service->description }}"
                            data-duration="{{ $service->duration }}" data-price="{{ $service->price }}"
                            data-provider_id="{{ $service->provider_id }}" data-status="{{ $service->status }}">
                        </i>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

<!-- Add Service Modal -->
<div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addServiceModalLabel">Add New Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('services.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="name" class="form-label">Service Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-2">
                        <label for="image" class="form-label">Service Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>

                    <div class="mb-2">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-2">
                        <label for="duration" class="form-label">Duration</label>
                        <input type="text" class="form-control" id="duration" name="duration" required>
                    </div>
                    <div class="mb-2">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>
                    <div class="mb-2">
                        <label for="provider_id" class="form-label">Provider</label>
                        <select class="form-select" id="provider_id" name="provider_id" required>
                            <option value="" disabled selected>Select Provider</option>
                            @foreach($providers as $provider)
                            <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            <option value="" disabled selected>Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
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

<!-- Edit Service Modal -->
<div class="modal fade" id="editServiceModal" tabindex="-1" aria-labelledby="editServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editServiceModalLabel">Edit Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('services.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $service->id }}">

                    <div class="mb-2">
                        <label for="editServiceName" class="form-label">Service Name</label>
                        <input type="text" class="form-control" id="editServiceName" name="name"
                            value="{{ $service->name }}" readonly>
                    </div>

                    <div class="mb-2">
                        <label for="editServiceCategory" class="form-label">Category</label>
                        <select class="form-select" id="editServiceCategory" name="category_id"style="pointer-events: none;">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == $service->category_id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-2">
                        <label for="editServiceProvider" class="form-label">Provider</label>
                        
                        <select class="form-select" id="editServiceProvider" name="provider_id"style="pointer-events: none;">
                        @foreach($providers as $provider)
                            <option value="{{ $provider->id }}"
                                {{ $provider->id == $service->provider_id ? 'selected' : '' }}>
                                {{ $provider->name }}
                            </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mb-2">
                        <label for="editServiceImage" class="form-label">Service Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>

                    <div class="mb-2">
                        <label for="editServiceDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="editServiceDescription" name="description"
                            rows="3">{{ $service->description }}</textarea>
                    </div>

                    <div class="mb-2">
                        <label for="editServiceDuration" class="form-label">Duration</label>
                        <input type="text" class="form-control" id="editServiceDuration" name="duration"
                            value="{{ $service->duration }}">
                    </div>

                    <div class="mb-2">
                        <label for="editServicePrice" class="form-label">Price</label>
                        <input type="number" class="form-control" id="editServicePrice" name="price"
                            value="{{ $service->price }}">
                    </div>

                    <div class="mb-2">
                        <label for="editServiceStatus" class="form-label">Status</label>
                        <select class="form-select" id="editServiceStatus" name="status" required>
                            <option value="1" {{ $service->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $service->status == 0 ? 'selected' : '' }}>Inactive</option>
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


<!-- Modal to Show Full Message -->
<div class="modal fade" id="showDescriptionModal" tabindex="-1" aria-labelledby="showDescriptionModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showDescriptionModalLabel">Full Description</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Name:</strong> <span id="serviceName"></span></p>
                <p><strong>Description:</strong></p>
                <p id="fullDescription"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    $('#servicesTable').DataTable({
        "ordering": false,
        "paging": true,
        "searching": true,
        "info": true,
    });
    // When the "Show" button is clicked

    $(document).ready(function() {
        $('.showDescription').on('click', function() {
            // Get description and name from data attributes
            var description = $(this).data('description');
            var name = $(this).data('name');

            // Set the data in the modal
            $('#fullDescription').text(description);
            $('#serviceName').text(name);

            // Show the modal
            var myModal = new bootstrap.Modal(document.getElementById('showDescriptionModal'));
            myModal.show();
        });
    });


    // Handle edit modal data population
    $('#editServiceModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);  
    var serviceId = button.data('id');
    var serviceName = button.data('name');
    var serviceDescription = button.data('description');
    var serviceDuration = button.data('duration');
    var servicePrice = button.data('price');
    var serviceProvider = button.data('provider_id');
    var serviceStatus = button.data('status');

    var modal = $(this);
    modal.find('#editServiceId').val(serviceId);  
    modal.find('#editServiceName').val(serviceName); 
    modal.find('#editServiceDescription').val(serviceDescription);
    modal.find('#editServiceDuration').val(serviceDuration);
    modal.find('#editServicePrice').val(servicePrice);
    modal.find('#editServiceProvider').val(serviceProvider);
    modal.find('#editServiceStatus').val(serviceStatus);
});



});

    document.querySelectorAll('.showDescription').forEach(button => {
        button.addEventListener('click', function () {
            const description = this.dataset.description || 'No description available';
            const name = this.dataset.name || 'No name available';
            const time = this.dataset.time || 'No date available';
            
        });
    });


</script>

@endsection