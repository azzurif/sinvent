<button
  {{ $attributes->merge(['type' => 'submit', 'class' => "inline-flex items-center px-4 py-2 bg-dark-red dark:bg-light-red rounded-md font-semibold text-xs text-primary dark:text-white active:shadow-md focus:shadow-md active:shadow-black focus:shadow-black  uppercase tracking-widest focus:bg-light-red dark:focus:bg-dark-red active:bg-light-red dark:active:bg-dark-red transition ease-in-out duration-150"]) }}>
  {{ $slot }}
</button>