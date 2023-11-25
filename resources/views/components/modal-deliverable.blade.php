@props(['service', 'deliverable', 'id'])

<!-- Modal -->
<div class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="modalDeliverableLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeliverableLabel">
                    @if($deliverable)
                        Edit Deliverable
                    @else
                        Add New Deliverable
                    @endif
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="deliverableForm" action="{{ $deliverable ? route('deliverables.update', $deliverable) : route('deliverables.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @if($deliverable)
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <input type="hidden" value="{{ $service->id_service }}" class="form-control" id="id_service" name="id_service" required>
                    </div>

                    <div class="form-group">
                        <label for="title">Deliverable Title:</label>
                        <input type="text" value="{{ old('title', $deliverable->title ?? 'Deliverable Z') }}"class="form-control" id="title" name="title" required>
                        @error('title')
                            <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="deliverable_description">Deliverable Description:</label>
                        <textarea class="form-control" id="deliverable_description" name="deliverable_description" required>{{ old('deliverable_description', $deliverable->description ?? 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit rem placeat, debitis dignissimos maiores unde vero fugit quis, molestiae et vitae ut dolore eum repellendus inventore facere, corrupti quas voluptatum') }}</textarea>
                        @error('deliverable_description')
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
