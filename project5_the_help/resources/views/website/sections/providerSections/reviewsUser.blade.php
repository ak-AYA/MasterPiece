<!-- Reviews Tab -->
<div class="col-md-12">
    <div class="card shadow rounded-4 p-4">
        <h5>Your Reviews</h5>
        @if($reviews->isEmpty())
        <p>You haven't left any reviews yet.</p>
        @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Provider</th>
                    <th>Stars</th>
                    <th>Review</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reviews as $review)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $review->provider->name ?? 'Unknown' }}</td>

                    <td>
                        @for ($i = 1; $i <= 5; $i++) 
                            @if ($i <= $review->stars)
                                <i class="fas fa-star text-warning"></i> <!-- full star -->
                            @else
                                <i class="fas fa-star"></i> <!-- empty star -->
                            @endif
                        @endfor
                    </td>
                    <td>
                        <!-- Button for showing full review text -->
                        <button class="showText" data-text="{{ $review->text }}"
                            style="border: none; background: none; padding: 0; outline: none;" data-bs-toggle="modal" data-bs-target="#showTextModal">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                    <td>{{ $review->created_at->format('Y-m-d') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>

<!-- Modal for Full Review Text -->
<div class="modal fade" id="showTextModal" tabindex="-1" aria-labelledby="showTextModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: #FDFDFD;">
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



<script>
document.addEventListener("DOMContentLoaded", function() {
    // Attach event listener to all buttons with class 'showText'
    document.querySelectorAll('.showText').forEach(button => {
        button.addEventListener('click', function() {
            // Get the review text from the data-text attribute of the clicked button
            var reviewText = this.getAttribute('data-text');
            
            // Set the review text in the modal
            document.getElementById('fullText').textContent = reviewText;
        });
    });
});
</script>