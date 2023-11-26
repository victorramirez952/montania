@props(['customer', 'projects', 'defaultProject'])
<!-- Modal -->
<div class="modal fade" id="modalProjectUser" tabindex="-1" role="dialog" aria-labelledby="modalProjectUserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalProjectUserLabel">
                    My projects
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="projectsUserForm" action="{{ route('customers.show', $customer) }}" method="GET" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group">
                        <select class="form-control" id="default_project" name="default_project" required>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id_project }}" {{ $project->id_project == $defaultProject->id_project ? 'selected' : '' }}>
                                {{ $project->name }}
                            </option>
                        @endforeach
                        </select>
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