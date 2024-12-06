@extends('layouts.master')
@section('title', 'Payments Management')
@section('content')

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
        <h2>Payment Management</h2>
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addPaymentModal">
            Add New Payment
        </button>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table id="paymentsTable" class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Logo</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $payment->name }}</td>
                    <td>{{ $payment->description }}</td>
                    <td>
                        @if($payment->logo_url)
                        <img src="{{ asset('storage/' . $payment->logo_url) }}" class="rounded img-80">
                        @else
                        <span>No logo</span>
                        @endif
                    </td>
                    <td class="text-center">
                        @if($payment->is_active)
                        <i class="fas fa-check-circle text-success"></i>
                        @else
                        <i class="fas fa-times-circle text-warning"></i>
                        @endif
                    </td>

                    <td>
                        <i class="fas fa-edit icon-btn" data-bs-toggle="modal" data-bs-target="#editPaymentModal"
                            data-id="{{ $payment->id }}" data-name="{{ $payment->name }}"
                            data-description="{{ $payment->description }}" data-logo_url="{{ $payment->logo_url }}"
                            data-is_active="{{ $payment->is_active }}">
                        </i>


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Payment Modal -->
    <div class="modal fade" id="addPaymentModal" tabindex="-1" aria-labelledby="addPaymentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPaymentModalLabel">Add New Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Payment Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" class="form-control" id="logo" name="logo_url">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="is_active">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Payment Modal -->
    <div class="modal fade" id="editPaymentModal" tabindex="-1" aria-labelledby="editPaymentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPaymentModalLabel">Edit Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('payments.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id"  id="editPaymentId">
                        <div class="mb-3">
                            <label for="edit_name" class="form-label">Payment Name</label>
                            <input type="text" class="form-control" id="edit_name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_description" class="form-label">Description</label>
                            <textarea class="form-control" id="edit_description" name="description"></textarea>
                        </div>
                        <!-- Add the image preview inside the modal body -->
                        <div class="mb-3">
                            <label for="current_logo_preview" class="form-label">Current Logo</label>
                            <img id="current_logo_preview" src="" alt="Current Logo" class="img-fluid" />
                        </div>
                        <div class="mb-3">
                            <label for="edit_status" class="form-label">Status</label>
                            <select class="form-select" id="edit_status" name="is_active">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include scripts for passing data to the edit modal -->
<script>
$(document).ready(function() {
    $('#paymentsTable').DataTable({
        "ordering": false,
        "paging": true,
        "searching": true,
        "info": true,
    });

    $('#editPaymentModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var paymentName = button.data('name');
        var paymentDescription = button.data('description');
        var paymentLogoUrl = button.data('logo_url');
        var paymentStatus = button.data('is_active');

        var modal = $(this);
        modal.find('#editPaymentId').val(id);
        modal.find('#edit_name').val(paymentName);
        modal.find('#edit_description').val(paymentDescription);
        modal.find('#edit_status').val(paymentStatus);

        // Display current logo if available
        if (paymentLogoUrl) {
            modal.find('#current_logo_preview').attr('src', '/storage/' + paymentLogoUrl);
        } else {
            modal.find('#current_logo_preview').attr('src', ''); 
        }

        modal.find('#edit_status').val(paymentStatus);
    });
});
</script>



@endsection