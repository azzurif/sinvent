@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-primary dark:text-white']) }}>
    {{ $value ?? $slot }}
</label>
