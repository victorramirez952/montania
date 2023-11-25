@extends('layouts.app')

@section('title', 'deliverable ' . $deliverable->name)

@section('content')
    <x-Navbar/>
    <header class="title-bg title">
        <p class="text-center" style="font-size: 45px;">{{ $deliverable->name }}</p>
    </header>
    <form id="deliverableForm" action="{{ route('deliverables.update', $deliverable) }}" method="POST" class="needs-validation w-50 mx-auto my-4 p-2 border border-secondary" novalidate>
        @csrf
        @if($deliverable)
            @method('PUT')
        @endif

        <div class="form-group">
            <input type="hidden" value="{{ $service->id_service }}" class="form-control" id="id_service" name="id_service" required>
        </div>

        <div class="form-group">
            <label for="title">Deliverable Title:</label>
            <input type="text" value="{{ $deliverable->title ?? 'Deliverable Z' }}" class="form-control" id="title" name="title" required>
            @error('title')
                <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="deliverable_description">Deliverable Description:</label>
            <textarea class="form-control" oninput="autoResize(this)" id="deliverable_description" name="deliverable_description" required>{{ $deliverable->description ?? 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit rem placeat, debitis dignissimos maiores unde vero fugit quis, molestiae et vitae ut dolore eum repellendus inventore facere, corrupti quas voluptatum'}}</textarea>
            @error('deliverable_description')
                <div class="alert alert-danger text" role="alert" style="font-size: 12px">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="window.location.href = '{{ route('services.show', $service) }}'">Cancel</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>

  <x-WhatsAppButton/>
  <x-Footer/>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Call autoResize on page load to adjust the height based on the initial content
        autoResize(document.getElementById('deliverable_description'));
    });

    function autoResize(textarea) {
        textarea.style.height = 'auto'; // Reset height to auto to shrink back if needed
        textarea.style.height = (textarea.scrollHeight) + 'px'; // Set the height to the scrollHeight
    }
</script>
@endsection
