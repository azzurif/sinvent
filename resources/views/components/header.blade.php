<div class="flex flex-col items-center text-center mb-2">
  <h2 {{ $attributes->merge(['class' => 'font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight']) }}>
    {{ $slot }}
  </h2>

  @isset($subheader)
    {{ $subheader }}
  @endisset
</div>
