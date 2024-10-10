<button
  {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-transparet border border-dark-blue dark:border-light-blue rounded-md font-semibold text-xs text-primary dark:text-white uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:border-light-blue dark:focus:border-dark-blue disabled:opacity-25 transition ease-in-out duration-150']) }}>
  {{ $slot }}
</button>
