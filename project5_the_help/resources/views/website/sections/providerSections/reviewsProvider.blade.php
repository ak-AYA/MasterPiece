
<div class="col-md-12">
    <div class="card shadow rounded-4 p-4">
        <h5>Reviews</h5>
        @if($reviews->isEmpty())
            <p>No approved reviews available.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Stars</th>
                        <th>Text</th>
                        <th>Image</th>
                        <th>Date</th>
                        <th>User</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($reviews as $review)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @for ($i = 1; $i <= 5; $i++) 
                                @if ($i <= $review->stars)
                                    <i class="fas fa-star text-warning"></i> <!-- full star -->
                                @else
                                    <i class="fas fa-star"></i> <!-- empty -->
                                @endif
                            @endfor
                        </td>
                        <td>
                            <button class="showText" data-text="{{ $review->text }}" style="border: none; background: none; padding: 0; outline: none;">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                        <td>
                            @if($review->image)
                                <img src="{{ asset('uploads/reviews/' . $review->image) }}" alt="review Image" style="width: 60px; height: auto;">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td>{{ $review->date }}</td>
                        <td>{{ $review->user->name ?? 'Unknown User' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>



    <!-- Modal to Show Full Text -->
    <div class="modal fade"  id="showTextModal" tabindex="-1" aria-labelledby="showTextModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content "style="background-color: #FDFDFD;">
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
<script>
// When the "Show Text" button is clicked
    $('.showText').on('click', function() {
        var text = $(this).data('text');
        $('#fullText').text(text);
        var myModal = new bootstrap.Modal(document.getElementById('showTextModal'));
        myModal.show();
    });
    </script>