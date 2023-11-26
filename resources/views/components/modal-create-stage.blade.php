@props(['user', 'defaultProject'])
<!-- Modal -->
<div class="modal fade" id="modalStage" tabindex="-1" role="dialog" aria-labelledby="modalStageLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalStageLabel">
                    Add New Stage
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="stageForm" action="{{ route('stages.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <input type="hidden" name="id_project" value="{{ $defaultProject->id_project }}">
                    <input type="hidden" name="id_user" value="{{ $user->id_user }}">
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" value="{{ old('date', '') }}" class="form-control" id="date" name="date" required>
                        @error('date')
                            <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" value="1" class="form-check-input" id="completed" name="completed">
                            <label class="form-check-label" for="completed">Completed</label>
                        </div>
                        @error('completed')
                        <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description">{{ old('description', 'Lorem ipsum') }}</textarea>
                        @error('description')
                        <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Stage</button>
                    </div>
                </form>                
            </div>
        </div>
    </div>
</div>