@props(['type' => ''])

<button type="{{ $type }}" {{ $attributes->merge(['class' => 'btn btn-success']) }}>{{ $slot }}</button>
