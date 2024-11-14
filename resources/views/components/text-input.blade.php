@props(['disabled' => false])

<div class="relative">
  <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
      'class' =>
          'border border-dark-gray dark:border-dark-gray bg-transparent dark:text-white focus:border-dark-blue dark:focus:border-light-blue focus:ring-0 shadow-sm px-2 py-1 rounded-md text-sm',
  ]) !!} />
</div>
