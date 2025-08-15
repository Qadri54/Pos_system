@props([
    'name' => ''
])

<select name="{{ $name }}" {{ $attributes->merge(['class' => 'rounded-3 form-control']) }}>
    {{ $slot }}
</select>
