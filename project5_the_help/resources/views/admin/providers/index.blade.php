@extends('layouts.master')
@section('title', 'Providers Management')
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
        <h2>Providers Management</h2>
        <!-- <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addProviderModal">
            Add New Provider
        </button> -->
    </div>


    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Providers Table -->
    <div class="table-responsive">
        <table id="providersTable" class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($providers as $provider)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $provider->name }}</td>
                        <td>{{ $provider->email }}</td>
                        <td>{{ $provider->phone }}</td>
                        <td>{{ $provider->location }}</td>
                        <td class="text-center">
                    @if($provider->status)
                        <i class="fas fa-check-circle text-success"></i>
                    @else
                        <i class="fas fa-times-circle text-warning"></i>
                    @endif
                </td>
                        <td class="text-center">
                            <!-- Edit Icon -->
                            <i class="fas fa-edit icon-btn" 
                               data-bs-toggle="modal" 
                               data-bs-target="#editProviderModal"
                               data-id="{{ $provider->id }}" 
                               data-name="{{ $provider->name }}" 
                               data-email="{{ $provider->email }}" 
                               data-phone="{{ $provider->phone }}" 
                               data-location="{{ $provider->location }}" 
                               data-status="{{ $provider->status }}">
                            </i>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add Provider Modal -->
<div class="modal fade" id="addProviderModal" tabindex="-1" aria-labelledby="addProviderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('providers.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addProviderModalLabel">Add New Provider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="providerName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="providerName" name="name" required>
                    </div>
                    <div class="mb-2">
                        <label for="providerEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="providerEmail" name="email" required>
                    </div>
                    <div class="mb-2">
                        <label for="providerPhone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="providerPhone" name="phone" required>
                    </div>
                    <div class="mb-2">
                        <label for="userPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="userPassword" name="password" required>
                    </div>
                    <div class="mb-2">
                        <label for="providerLocation" class="form-label">Location</label>
                        <input type="text" class="form-control" id="providerLocation" name="location" required>
                    </div>
                    <div class="mb-2">
                        <label for="providerStatus" class="form-label">Status</label>
                        <select class="form-control" id="providerStatus" name="status" required>
                            <option value="1">Active</option>
                            <option value="0">Deactivated</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Provider</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Provider Modal -->
<div class="modal fade" id="editProviderModal" tabindex="-1" aria-labelledby="editProviderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('providers.update', $provider->id) }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="editProviderId">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProviderModalLabel">Edit Provider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="editProviderName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editProviderName" name="name" readonly>
                    </div>
                    <div class="mb-2">
                        <label for="editProviderEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editProviderEmail" name="email" readonly>
                    </div>
                    <div class="mb-2">
                        <label for="editProviderPhone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="editProviderPhone" name="phone" readonly>
                    </div>
                    <div class="mb-2">
                        <label for="editProviderLocation" class="form-label">Location</label>
                        <input type="text" class="form-control" id="editProviderLocation" name="location" readonly>
                    </div>
                    <div class="mb-2">
                        <label for="editProviderStatus" class="form-label">Status</label>
                        <select class="form-control" id="editProviderStatus" name="status" required>
                            <option value="1">Active</option>
                            <option value="0">Deactivated</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Provider</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript Section -->
<script>
    // Initialize DataTable
    $(document).ready(function() {
        $('#providersTable').DataTable({
        "ordering": false,    // Disable sorting arrows
        "paging": true,       // Enable pagination
        "searching": true,    // Enable search functionality
        "info": false,        // Disable info text like "Showing 1 to 10 of 50 entries"
    });
    });

    // Populate edit modal with provider data
    $('#editProviderModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); 
        var providerId = button.data('id');
        var providerName = button.data('name');
        var providerEmail = button.data('email');
        var providerPhone = button.data('phone');
        var providerLocation = button.data('location');
        var providerStatus = button.data('status');

        var modal = $(this);
        modal.find('#editProviderId').val(providerId);
        modal.find('#editProviderName').val(providerName);
        modal.find('#editProviderEmail').val(providerEmail);
        modal.find('#editProviderPhone').val(providerPhone);
        modal.find('#editProviderLocation').val(providerLocation);
        modal.find('#editProviderStatus').val(providerStatus);
    });

   
</script>
@endsection
