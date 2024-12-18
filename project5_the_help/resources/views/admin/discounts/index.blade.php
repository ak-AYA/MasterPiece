@extends('layouts.master')
@section('title', 'Discount Management')
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
        <h2>Discount Management</h2>
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addDiscountModal">
            Add New Discount
        </button>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-container mt-3">
        <table id="discountTable" class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Code</th>
                    <th>Amount</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($discounts as $discount)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $discount->code }}</td>
    <td>{{ $discount->amount }}</td>
    <td>{{ date('Y-m-d', strtotime($discount->date_start)) }}</td>
    <td>{{ date('Y-m-d', strtotime($discount->date_end)) }}</td>

    <td>
        @if($discount->status)
        <i class="fas fa-check-circle text-success"></i>
        @else
        <i class="fas fa-times-circle text-warning"></i>
        @endif
    </td>
    <td>
        <i class="fas fa-edit icon-btn" data-bs-toggle="modal" data-bs-target="#editDiscountModal"
            data-id="{{ $discount->id }}" data-code="{{ $discount->code }}"
            data-amount="{{ $discount->amount }}" data-start_date="{{ $discount->date_start }}"
            data-end_date="{{ $discount->date_end }}" data-status="{{ $discount->status }}"></i>

    </td>
</tr>
@endforeach


            </tbody>

        </table>
    </div>
</div>

<!-- Add Discount Modal -->
<div class="modal fade" id="addDiscountModal" tabindex="-1" aria-labelledby="addDiscountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDiscountModalLabel">Add New Discount</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('discounts.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="code" class="form-label">Discount Code</label>
                        <input type="text" class="form-control" id="code" name="code" required>
                    </div>
                    <div class="mb-2">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" required>
                    </div>
                    <div class="mb-2">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>
                    <div class="mb-2">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" required>
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

<!-- Edit Discount Modal -->
<div class="modal fade" id="editDiscountModal" tabindex="-1" aria-labelledby="editDiscountModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDiscountModalLabel">Edit Discount</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('discounts.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" name="id" id="editDiscountId">
                    <div class="mb-2">
                        <label for="editDiscountCode" class="form-label">Discount Code</label>
                        <input type="text" class="form-control" id="editDiscountCode" name="code" required>
                    </div>
                    <div class="mb-2">
                        <label for="editDiscountAmount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="editDiscountAmount" name="amount" required>
                    </div>
                    <div class="mb-2">
                        <label for="editDiscountStartDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="editDiscountStartDate" name="start_date">
                    </div>
                    <div class="mb-2">
                        <label for="editDiscountEndDate" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="editDiscountEndDate" name="end_date">
                    </div>
                    <div class="mb-2">
                        <label for="editDiscountStatus" class="form-label">Status</label>
                        <select class="form-select" id="editDiscountStatus" name="status" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#discountTable').DataTable({
        paging: true,
        searching: true,
        ordering: false,
        info: true,
        responsive: true
    });

    $('#editDiscountModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var discountId = button.data('id');
        var discountCode = button.data('code');
        var discountAmount = button.data('amount');
        var discountStartDate = button.data('start_date');
        var discountEndDate = button.data('end_date');
        var discountStatus = button.data('status');

        // Populate the modal fields
        $('#editDiscountId').val(discountId);
        $('#editDiscountCode').val(discountCode);
        $('#editDiscountAmount').val(discountAmount);
        $('#editDiscountStartDate').val(discountStartDate);
        $('#editDiscountEndDate').val(discountEndDate);
        $('#editDiscountStatus').val(discountStatus);
    });

});
document.querySelector('form').addEventListener('submit', function(event) {
    // Get input values
    const code = document.querySelector('#code').value;
    const amount = document.querySelector('#amount').value;
    const startDate = document.querySelector('#start_date').value;
    const endDate = document.querySelector('#end_date').value;
    const status = document.querySelector('#status').value;

    // Validate code (alphanumeric, length 4-20)
    const codeRegex = /^[A-Za-z0-9]{4,20}$/;
    if (!codeRegex.test(code)) {
        alert('Invalid discount code. It should be alphanumeric and between 4 to 20 characters.');
        event.preventDefault();
        return;
    }

    // Validate amount (numeric, greater than 0)
    if (isNaN(amount) || amount <= 0) {
        alert('Amount must be a positive number');
        event.preventDefault();
        return;
    }

    // Validate start date (must be today or future)
    const startDateObj = new Date(startDate);
    if (startDateObj < new Date()) {
        alert('Start date cannot be in the past');
        event.preventDefault();
        return;
    }

    // Validate end date (must be after start date)
    const endDateObj = new Date(endDate);
    if (endDateObj <= startDateObj) {
        alert('End date must be after the start date');
        event.preventDefault();
        return;
    }

    // Validate status (either 0 or 1)
    if (status !== '0' && status !== '1') {
        alert('Invalid status. It must be either Active (1) or Inactive (0)');
        event.preventDefault();
        return;
    }
});
</script>

@endsection