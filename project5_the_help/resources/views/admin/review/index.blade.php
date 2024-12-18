@extends('layouts.master')
@section('title', 'reviewsManagement')
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

.table img {
    max-width: 80px;
    height: 60px;
    border-radius: 5px;
}
</style>

<div class="container mt-4">
    <div class="page-header d-flex justify-content-between align-items-center bg-light p-3 mb-4 rounded">
        <h2>Reviews Management</h2>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table id="reviewsTable" class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Stars</th>
                    <th>Text</th>
                    <th>Image</th>
                    <th>Date</th>
                    <th>User</th>
                    <th>Provider</th>
                    <th>Approved</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reviews as $review)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @for ($i = 1; $i <= 5; $i++) @if ($i <=$review->stars)
                            <i class="fas fa-star text-warning"></i> <!-- full star -->
                            @else
                            <i class="fas fa-star"></i> <!-- empty -->
                            @endif
                            @endfor
                    </td>
                    <td>
                        <button class="showText" data-text="{{ $review->text }}" style="border: none; background: none; padding: 0; outline: none;">
                            <i class="fas fa-eye" ></i>
                        </button>


                    </td>
                    <td>
                        @if($review->image)
                        <img src="{{ asset('uploads/reviews/' . $review->image) }}" alt="review Image"
                            style="width: 60px; height: auto;">
                        @else
                        <span>No Image</span>
                        @endif
                    </td>
                    <td>{{ $review->date }}</td>
                    <td>{{ $review->user->name ?? 'Unknown User' }}</td>
                    <td>{{ $review->provider->name ?? 'Unknown Provider' }}</td>
                    <td class="text-center">
                        @if($review->is_approved)
                        <i class="fas fa-check-circle text-success"></i>
                        @else
                        <i class="fas fa-times-circle text-warning"></i>
                        @endif
                    </td>
                    <td>
                        <i class="fas fa-edit icon-btn" data-bs-toggle="modal" data-bs-target="#editStatusModal"
                            data-id="{{ $review->id }}" data-is_approved="{{ $review->is_approved }}"></i>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal to Show Full Text -->
    <div class="modal fade" id="showTextModal" tabindex="-1" aria-labelledby="showTextModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showTextModalLabel">Full Review Text</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="fullText"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Approval Status Modal -->
    <div class="modal fade" id="editStatusModal" tabindex="-1" aria-labelledby="editStatusModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editStatusModalLabel">Edit Approval Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('reviews.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="reviewId">
                        <div class="mb-3">
                            <label for="is_approved" class="form-label">Approval Status</label>
                            <select class="form-select" id="is_approved" name="is_approved">
                                <option value="1">Approved</option>
                                <option value="0">Not Approved</option>
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
    $('#reviewsTable').DataTable({
        "ordering": false,
        "paging": true,
        "searching": true,
        "info": true,
    });

    // When the "Show Text" button is clicked
    $('.showText').on('click', function() {
        var text = $(this).data('text');
        $('#fullText').text(text);
        var myModal = new bootstrap.Modal(document.getElementById('showTextModal'));
        myModal.show();
    });

    // Populate edit modal with data
    $('#editStatusModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var isApproved = button.data('is_approved');
        var modal = $(this);
        modal.find('#reviewId').val(id);
        modal.find('#is_approved').val(isApproved ? '1' : '0');
    });
});
</script>

@endsection