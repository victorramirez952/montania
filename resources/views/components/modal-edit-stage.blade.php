@props(['user', 'defaultProject'])
<!-- Modal -->
<div class="modal fade" id="modalEditStage" tabindex="-1" role="dialog" aria-labelledby="modalEditStageLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditStageLabel">
                    Edit Stage
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="stageForm" action="{{ route('stages.update', $defaultProject->id_project) }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id_project" value="{{ $defaultProject->id_project }}">
                    <input type="hidden" name="id_stage" value="" id="id_stage">
                    <input type="hidden" name="id_customer" value="{{ $user->id_user }}" id="id_customer">
                    <div class="form-group">
                        <label for="edit_date">Date:</label>
                        <input type="date" value="{{ old('date', '') }}" class="form-control" id="edit_date" name="date" required>
                        @error('date')
                            <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" value="1" class="form-check-input" id="edit_completed" name="completed">
                            <label class="form-check-label" for="edit_completed">Completed</label>
                        </div>
                        @error('completed')
                        <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="edit_description">Description:</label>
                        <textarea class="form-control" id="edit_description" name="description">{{ old('description', 'Lorem ipsum') }}</textarea>
                        @error('description')
                        <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>                
            </div>
        </div>
    </div>
</div>