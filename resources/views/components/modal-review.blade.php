@props(['project', 'review'])
<!-- Modal -->
<div class="modal fade" id="modalReview" tabindex="-1" role="dialog" aria-labelledby="modalReviewLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalReviewLabel">
                    @if($review)
                        Edit Review
                    @else
                        Add New Review
                    @endif
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addReviewFomr" action="{{ $review ? route('projects.update', $project) : route('projects.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @if($review)
                        @method('PUT')
                    @endif
                    <!-- Add this within the modal-body section -->
                    <div class="form-group">
                        <label for="user_search">Search User:</label>
                        <input type="text" class="form-control" id="user_search" name="user_search" placeholder="Enter ID, Last Name, First Name, or Email">
                    </div>
                    <div id="search_results"></div>
                    <div class="form-group">
                        <label for="text">Text:</label>
                        <textarea class="form-control" id="text" name="text">{{ old('text', $review->text ?? 'Lorem ipsum') }}</textarea>
                        @error('text')
                        <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>                
            </div>
        </div>
    </div>
</div>
<script type="module">
    $(document).ready(function() {
        $('#user_search').on('input', function() {
            var query = $(this).val();

            if (query.length > 0) {
                $.ajax({
                    url: '{{ route("user.search") }}',
                    method: 'GET',
                    data: { query: query },
                    success: function(response) {
                        displaySearchResults(response.results);
                    }
                });
            } else {
                $('#search_results').html('');
            }
        });

        // Function to display search results in a table
        function displaySearchResults(results) {
            var resultsHtml = '<table class="table table-bordered">' +
                                '<thead>' +
                                    '<tr>' +
                                        '<th>ID</th>' +
                                        '<th>First Names</th>' +
                                        '<th>Last Names</th>' +
                                        '<th>Email</th>' +
                                    '</tr>' +
                                '</thead>' +
                                '<tbody>';

            results.forEach(function(user) {
                resultsHtml += '<tr class="user-result" data-user-id="' + user.id_user + '" data-user-first-names="' + user.first_names + '" data-user-last-names="' + user.last_names + '">' +
                                    '<td>' + user.id_user + '</td>' +
                                    '<td>' + user.first_names + '</td>' +
                                    '<td>' + user.last_names + '</td>' +
                                    '<td>' + user.email + '</td>' +
                                '</tr>';
            });

            resultsHtml += '</tbody></table>';

            $('#search_results').html(resultsHtml);
        }

        // Add this to handle user selection within the modal
        $(document).on('click', '.user-result', function() {
            var userId = $(this).data('user-id');
            var userFirstNames = $(this).data('user-first-names');
            var userLastNames = $(this).data('user-last-names');

            var userName = userFirstNames + ' ' + userLastNames;

            $('#user_search').val(userName);
            // You can also store the user ID in a hidden input field for submission if needed
            // $('#selected_user_id').val(userId);

            $('#search_results').html(''); // Clear search results
        });
    });
</script>
