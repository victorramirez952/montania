@props(['customer', 'defaultProject'])

<div class="border border-secondary w-25 d-flex flex-column align-items-center justify-content-center p-2">
    {{-- <h5 class="text-center">{{ $defaultProject->name }}</h5> --}}
    <button type="button"
        class="btn btn-primary pmd-btn-icon pmd-ripple-effect d-flex justify-content-center align-items-center"
        onclick="window.location.href = '{{ route('customers.show', ['customer' => $customer]) }}'">
        <i class="fa-solid fa-house-chimney h3"></i>
    </button>
    <button type="button"
        class="btn btn-primary pmd-btn-icon pmd-ripple-effect mt-4 d-flex justify-content-center align-items-center"
        onclick="window.location.href = '{{ route('customers.resources', ['customer' => $customer, 'defaultProject' => $defaultProject]) }}'">
        <i class="fa-solid fa-folder-open h3"></i>
    </button>
</div>
