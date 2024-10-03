<a {{ $attributes->merge(['class' => 'underline text-sm text-dark-gray dark:text-light-gray hover:text-light-gray dark:hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-dark-blue dark:focus:ring-offset-light-gray']) }}
  wire:navigate>
  {{ $slot }}
</a>
