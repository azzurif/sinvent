<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-green-600 dark:bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:shadow-md focus:bg-green-600 dark:focus:bg-green-500 active:bg-green-500 dark:active:bg-green-600 focus:outline-none transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
