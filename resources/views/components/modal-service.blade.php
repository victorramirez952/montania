@props(['service'])
<!-- Modal -->
<div class="modal fade" id="modalService" tabindex="-1" role="dialog" aria-labelledby="modalServiceLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalServiceLabel">
                    @if($service)
                        Edit Service
                    @else
                        Add New Service
                    @endif
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addServiceForm" action="{{ $service ? route('services.update', $service) : route('services.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @if($service)
                        @method('PUT')
                    @endif
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" value="{{ $service->name ?? 'Service Z' }}" class="form-control" id="name" name="name" required>
                        @error('name')
                            <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="cover_icon">Cover Icon:</label>
                        <input type="file" class="form-control-file" id="cover_icon" name="cover_icon">
                        @error('cover_icon')
                            <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="duration">Duration:</label>
                        <input type="number" value="{{ $service->duration ?? '7' }}" class="form-control" id="duration" name="duration" required>
                        @error('duration')
                            <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Time Units:">Time Units:</label>
                        <select class="form-control" id="time_units" name="time_units" required>
                            <option value="Minutes" {{ isset($service) && $service->time_units == 'Minutes' ? 'selected' : '' }}>Minutes</option>
                            <option value="Hours" {{ isset($service) && $service->time_units == 'Hours' ? 'selected' : '' }}>Hours</option>
                        </select>
                        <label for="time_units"></label>
                        @error('time_units')
                            <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sessions_number">Sessions Number:</label>
                        <input type="number" value="{{ $service->sessions_number ?? '7' }}" class="form-control" id="sessions_number" name="sessions_number" required>
                        @error('sessions_number')
                        <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="link_booking">Link Booking:</label>
                        <textarea class="form-control" id="link_booking" name="link_booking">{{ $service->link_booking ?? 'https://youtu.be/dQw4w9WgXcQ?si=w_zX5vz3jdHz8Yx7' }}</textarea>
                        @error('link_booking')
                        <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" value="1" class="form-check-input" id="principal_service" name="principal_service" {{ isset($service) && $service->principal_service ? 'checked' : '' }}>
                            <label class="form-check-label" for="principal_service">Principal Service</label>
                        </div>
                        @error('principal_service')
                        <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description">{{ $service->description ?? 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit rem placeat, debitis dignissimos maiores unde vero fugit quis, molestiae et vitae ut dolore eum repellendus inventore facere, corrupti quas voluptatum'}}</textarea>
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