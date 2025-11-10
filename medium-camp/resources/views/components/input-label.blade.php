@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm dark:text-gray-900 text-white']) }}>
    {{ $value ?? $slot }}
</label>