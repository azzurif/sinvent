<textarea
  {{ $attributes->merge(['rows' => '4', 'class' => 'block p-2.5 w-full text-sm text-primary bg-light-gray rounded-lg border border-dark-gray dark:border-dark-gray bg-transparent dark:text-white focus:border-dark-blue dark:focus:border-light-blue focus:ring-0 dark:text-white']) }}>{{ $slot }}</textarea> 
