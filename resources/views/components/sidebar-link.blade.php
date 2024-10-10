@props(['active'])

@php
  $classes =
      $active ?? false
          ? 'dark:text-light-blue dark:hover:bg-primary group flex items-center rounded-lg p-2 text-dark-blue hover:bg-white bg-white dark:bg-primary'
          : 'dark:text-white dark:hover:bg-primary group flex items-center rounded-lg p-2 text-primary hover:bg-white';
@endphp

<li>
  <a {{ $attributes->merge(['class' => $classes]) }} wire:navigate>
    <span class="ms-3">{{ $slot }}</span>
  </a>
</li>
