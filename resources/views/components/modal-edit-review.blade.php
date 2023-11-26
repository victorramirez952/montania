@props(['project', 'review'])
<!-- Modal -->
<div class="modal fade" id="modalEditReview" tabindex="-1" role="dialog" aria-labelledby="modalEditReviewLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditReviewLabel">
                    Edit Review
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editReviewForm," action="{{ route('reviews.update') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    {{-- <div class="form-group">
                        <label for="user_search">Search User:</label>
                        <input type="text" class="form-control" id="user_search" name="user_search" placeholder="Enter ID, Last Name, First Name, or Email">
                    </div>
                    <div id="search_results"></div> --}}
                    <h4>Project: {{ $project->name }}</h4>
                    <input type="hidden" name="id_review" id="edit_id_review" value="">
                    <div class="form-group">
                        <label for="edit_text">Text:</label>
                        <textarea class="form-control" id="edit_text" name="text">{{ old('text', 'Lorem ipsum') }}</textarea>
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
{{-- <script type="module">
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
</script> --}}
