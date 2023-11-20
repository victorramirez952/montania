@props(['supplier'])
<div>
    @if ($supplier->cover_icon)
        <img src="{{ $supplier->cover_icon }}">
    @else
    <img src="{{ asset('img/icono-contratistas.png') }}">
    @endif
    <p style="font-weight: bold; font-size: 18px;">{{ $supplier->name }}</p>
    <input type="hidden" name="phone" value="{{ $supplier->contact->phone }}">
    <button type="button" class="requestSupplier"> Request</button>
</div>