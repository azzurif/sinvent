<div {{ $attributes->class(['']) }}>
  <h2 class="dark:text-white text-lg font-medium leading-tight text-primary">
    {{ $slot }}
  </h2>

  @isset($subheader)
    <p class="dark:text-light-gray mt-1 text-sm text-dark-gray">
      {{ $subheader }}
    </p>
  @endisset
</div>
