<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-blue-600 dark:bg-light-blue border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:shadow-md focus:bg-blue-600 dark:focus:bg-light-blue active:bg-light-blue dark:active:bg-blue-600 focus:outline-none transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
