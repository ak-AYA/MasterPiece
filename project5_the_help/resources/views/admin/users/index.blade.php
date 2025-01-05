@extends('layouts.master')
@section('title', 'Users Management')
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
        <h2>User Management</h2>
        <!-- <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addUserModal">
            Add New User
        </button> -->
    </div>


    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Users Table -->
    <div class="table-responsive ">
        <table id="usersTable" class="table table-hover table-bordered">
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
                @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->location }}</td>
                    <td class="text-center">
                        @if($user->status)
                        <i class="fas fa-check-circle text-success"></i>
                        @else
                        <i class="fas fa-times-circle text-warning"></i>
                        @endif
                    </td>

                    <td class="text-center">
                        <!-- Edit Icon -->
                        <i class="fas fa-edit icon-btn" data-bs-toggle="modal" data-bs-target="#editUserModal"
                            data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}"
                            data-phone="{{ $user->phone }}" data-location="{{ $user->location }}"
                            data-status="{{ $user->status }}">
                        </i>
                        <!-- Deactivate/Activate Icon -->
                        <!-- <i class="fas fa-user-times icon-btn" 
                               onclick="confirmStatusChange(event, '{{ route('users.delete', $user->id) }}', '{{ $user->status ? 'deactivate' : 'activate' }}')"></i> -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('users.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="userName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="userName" name="name" required>
                    </div>
                    <div class="mb-2">
                        <label for="userEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="userEmail" name="email" required>
                    </div>
                    <div class="mb-2">
                        <label for="userPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="userPassword" name="password" required>
                    </div>
                    <div class="mb-2">
                        <label for="userPhone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="userPhone" name="phone" required>
                    </div>
                    <div class="mb-2">
                        <label for="userLocation" class="form-label">Location</label>
                        <input type="text" class="form-control" id="userLocation" name="location" required>
                    </div>
                    <div class="mb-2">
                        <label for="userStatus" class="form-label">Status</label>
                        <select class="form-control" id="userStatus" name="status" required>
                            <option value="1">Active</option>
                            <option value="0">Deactivated</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('users.update') }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="editUserId">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="editUserName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editUserName" name="name" readonly>
                    </div>
                    <div class="mb-2">
                        <label for="editUserEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editUserEmail" name="email" readonly>
                    </div>
                    <div class="mb-2">
                        <label for="editUserPhone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="editUserPhone" name="phone" readonly>
                    </div>
                    <div class="mb-2">
                        <label for="editUserLocation" class="form-label">Location</label>
                        <input type="text" class="form-control" id="editUserLocation" name="location" readonly>
                    </div>
                    <div class="mb-2">
                        <label for="editUserStatus" class="form-label">Status</label>
                        <select class="form-control" id="editUserStatus" name="status" required>
                            <option value="1">Active</option>
                            <option value="0">Deactivated</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript Section -->
<script>
    $(document).ready(function() {
        $('#usersTable').DataTable({
            "ordering": false, // Disable sorting arrows
            "paging": true, // Enable pagination
            "searching": true, // Enable search functionality
            "info": false, // Disable info text like "Showing 1 to 10 of 50 entries"
        });
    });

    // Populate edit modal with user data
    $('#editUserModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var userId = button.data('id');
        var userName = button.data('name');
        var userEmail = button.data('email');
        var userPhone = button.data('phone');
        var userLocation = button.data('location');
        var userStatus = button.data('status');

        var modal = $(this);
        modal.find('#editUserId').val(userId);
        modal.find('#editUserName').val(userName);
        modal.find('#editUserEmail').val(userEmail);
        modal.find('#editUserPhone').val(userPhone);
        modal.find('#editUserLocation').val(userLocation);
        modal.find('#editUserStatus').val(userStatus);
    });
</script>

@endsection