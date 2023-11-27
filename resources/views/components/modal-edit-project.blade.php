@props(['customer', 'project'])
<!-- Modal -->
<div class="modal fade" id="modalEditProject" tabindex="-1" role="dialog" aria-labelledby="modalEditProjectLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditProjectLabel">
                    Edit project
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="projectForm" action="{{ route('projects.update', $project) }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    @if ($customer)
                        <input type="hidden" name="id_customer" id="id_customer" value="{{ $customer->id_customer }}">
                    @endif
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" value="{{ old('name', $project->name ?? 'Project Z') }}" class="form-control" id="name" name="name" required>
                        @error('name')
                            <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="place">Place:</label>
                        <input type="text" value="{{ old('place', $project->place ?? 'City Z')}}"  class="form-control" id="place" name="place" required>
                        @error('place')
                            <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="start_date">Start Date:</label>
                        <input type="date" value="{{ old('start_date', $project->start_date ?? '') }}" class="form-control" id="start_date" name="start_date" required>
                        @error('start_date')
                            <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date:</label>
                        <input type="date" value="{{ old('end_date', $project->end_date ?? '') }}" class="form-control" id="end_date" name="end_date" required>
                        @error('end_date')
                            <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="type">Type:</label>
                        <input type="text" value="{{ old('type', $project->type ?? 'Residencial') }}" class="form-control" id="type" name="type" required>
                        @error('type')
                        <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description">{{ old('description', $project->description ?? 'Lorem ipsum') }}</textarea>
                        @error('description')
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