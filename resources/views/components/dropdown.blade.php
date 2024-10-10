{{-- @props([
    'align' => 'right',
    'width' => '48',
    'contentClasses' => 'py-1 bg-white dark:bg-primary divide-y divide-dark-gray dark:divide-light-gray',
])

@php
  $alignmentClasses = match ($align) {
      'left' => 'ltr:origin-top-left rtl:origin-top-right start-0',
      'top' => 'origin-top',
      default => 'ltr:origin-top-right rtl:origin-top-left end-0',
  };

  $width = match ($width) {
      '48' => 'w-48',
      default => $width,
  };
@endphp

<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
  <div @click="open = ! open">
    {{ $trigger }}
  </div>

  <div class="{{ $width }} {{ $alignmentClasses }} absolute z-50 mt-2 rounded-md shadow-lg" style="display: none;"
    x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" @click="open = false">
    <div class="{{ $contentClasses }} rounded-md ring-1 ring-black ring-opacity-5">
      {{ $content }}
    </div>
  </div>
</div> --}}

@props([
    'align' => 'right', 
    'width' => '48',
    'position' => 'bottom',  // Add position prop to determine dropdown placement (top or bottom)
    'contentClasses' => 'py-1 bg-white dark:bg-primary divide-y divide-dark-gray dark:divide-light-gray',
])

@php
  $alignmentClasses = match ($align) {
      'left' => 'ltr:origin-top-left rtl:origin-top-right start-0',
      'right' => 'ltr:origin-top-right rtl:origin-top-left end-0',
      'center' => 'origin-top-center',
      default => 'ltr:origin-top-right rtl:origin-top-left end-0', // Default to right
  };

  $width = match ($width) {
      '48' => 'w-48',
      default => $width,
  };

  // Determine dropdown position
  $positionClasses = match ($position) {
      'top' => 'bottom-full mb-2', // Position dropdown above the trigger element
      'bottom' => 'top-full mt-2',  // Position dropdown below the trigger element
      default => 'top-full mt-2',   // Default to bottom
  };
@endphp

<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
  <div @click="open = ! open">
    {{ $trigger }}
  </div>

  <div class="{{ $width }} {{ $alignmentClasses }} {{ $positionClasses }} absolute z-50 rounded-md shadow-lg" style="display: none;"
       x-show="open" x-transition:enter="transition ease-out duration-200"
       x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
       x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100"
       x-transition:leave-end="opacity-0 scale-95" @click="open = false">
    <div class="{{ $contentClasses }} rounded-md ring-1 ring-black ring-opacity-5">
      {{ $content }}
    </div>
  </div>
</div>
