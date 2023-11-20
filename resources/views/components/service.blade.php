@props(['service'])
<div onclick="window.location.href = '{{ route('services.show', $service) }}'" style="cursor: pointer">
    @if ($service->cover_icon)
        <img src="{{ $service->cover_icon }}">
    @else
    <img src="{{ asset('img/icono-design-project.png') }}">
    @endif
    <p style="font-weight: bold; font-size: 18px;">{{ $service->name }}</p>
    @foreach ($service->prices as $price)
        @if ($price->m2 == true)
            <p style="font-size: 18px;">Desde {{ $price->price }} x m2</p>
        @else
            <p style="font-size: 18px;">Desde {{ $price->price }}</p>
        @endif
    @endforeach
</div>