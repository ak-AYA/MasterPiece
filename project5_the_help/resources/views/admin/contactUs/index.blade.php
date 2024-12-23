@extends('layouts.master')
@section('title', 'Contact Us Management')
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
        <h2>Contact Us Management</h2>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    <div class="table-responsive">
        <table id="contactTable" class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $message)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->email }}</td>
                    <td>
                        <button class="showMessage" data-message="{{ $message->message }}"
                            data-email="{{ $message->email }}" data-time="{{ $message->created_at }}">
                            <i class="fas fa-eye"></i> <!-- Eye icon -->
                        </button>
                    </td>


                    <td class="text-center">
                        @if($message->is_read == 1)
                        <i class="fas fa-check-circle text-success"></i> <!-- Read -->
                        @else
                        <i class="fas fa-times-circle text-warning"></i> <!-- Unread -->
                        @endif
                    </td>
                    <td>
                        <i class="fas fa-edit icon-btn" data-bs-toggle="modal" data-bs-target="#editStatusModal"
                            data-id="{{ $message->id }}" data-status="{{ $message->status }}"></i>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal to Show Full Message -->
    <div class="modal fade" id="showMessageModal" tabindex="-1" aria-labelledby="showMessageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showMessageModalLabel">Full Message Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Email:</strong> <span id="messageEmail"></span></p>
                    <p><strong>Time:</strong> <span id="messageTime"></span></p>
                    <p><strong>Message:</strong></p>
                    <p id="fullMessage"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Status Modal (remains the same) -->
    <div class="modal fade" id="editStatusModal" tabindex="-1" aria-labelledby="editStatusModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editStatusModalLabel">Edit Contact Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('contact_us.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="contactId">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="is_read" name="is_read">
                                <option value="1">Read</option>
                                <option value="0">Unread</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Status</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
$(document).ready(function() {
    // Initialize DataTable
    $('#contactTable').DataTable({
        "ordering": true,
        "paging": true,
        "searching": true,
        "info": true,
    });

    // When the "Show" button is clicked
    $('.showMessage').on('click', function() {
        // Get message, email, and time from data attributes
        var message = $(this).data('message');
        var email = $(this).data('email');
        var time = $(this).data('time');

        // Set the data in the modal
        $('#fullMessage').text(message);
        $('#messageEmail').text(email);
        $('#messageTime').text(time);

        // Show the modal
        var myModal = new bootstrap.Modal(document.getElementById('showMessageModal'));
        myModal.show();
    });

    $('#editStatusModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var status = button.data('status');
        var modal = $(this);
        modal.find('#contactId').val(id);
        modal.find('#status').val(status ? '1' :
            '0');
    });

});
</script>
@endsection