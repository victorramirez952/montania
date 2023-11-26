@props(['customer', 'defaultProject'])
<!-- Modal -->
<div class="modal fade" id="modalResource" tabindex="-1" role="dialog" aria-labelledby="modalResourceLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalResourceLabel">
                    Add New Resource
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="resourceForm" action="{{ route('resources.store', ['customer' => $customer, 'defaultProject' => $defaultProject]) }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" value="{{ old('title', 'Title Z') }}" class="form-control" id="title" name="title" required>
                        @error('title')
                            <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="link">Link:</label>
                        <textarea class="form-control" id="link" name="link">{{ old('link', 'https://youtu.be/dQw4w9WgXcQ?si=w_zX5vz3jdHz8Yx7') }}</textarea>
                        @error('link')
                        <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Resource</button>
                    </div>
                </form>                
            </div>
        </div>
    </div>
</div>