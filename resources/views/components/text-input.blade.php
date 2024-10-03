@props(['disabled' => false])

<div class="relative">
  <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
      'class' =>
          'border-b-2 border-x-0 border-t-0 border-dark-gray dark:border-white dark:bg-transparent dark:text-white focus:border-dark-blue dark:focus:border-light-blue focus:ring-0 shadow-sm pl-2 py-1 rounded-sm',
  ]) !!} />
</div>
