@props(['supplier'])
<div>
    <img src="{{ $supplier['src'] }}">
    <p style="font-weight: bold; font-size: 18px;">{{ $supplier['title'] }}</p>
    <button type="button" class="requestSupplier"> Request</button>
</div>