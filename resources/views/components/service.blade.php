@props(['service'])
<div>
    <img src="{{ $service['src'] }}">
    <p style="font-weight: bold; font-size: 18px;">{{ $service['title'] }}</p>
    <p style="font-size: 18px;">{{ $service['subtitle'] }}</p>
</div>