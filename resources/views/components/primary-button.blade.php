<button
  {{ $attributes->merge(['type' => 'submit', 'class' => "inline-flex items-center px-4 py-2 bg-dark-blue dark:bg-light-blue rounded-md font-semibold text-xs text-primary dark:text-white active:shadow-md focus:shadow-md active:shadow-black focus:shadow-black  uppercase tracking-widest focus:bg-light-blue dark:focus:bg-dark-blue active:bg-light-blue dark:active:bg-dark-blue transition ease-in-out duration-150"]) }}>
  {{ $slot }}
</button>

{{-- inline-flex items-center px-4 py-2 bg-cold-black dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 --}}
