@props(['active' => false])

<li>
  <a @class(['dark:text-white group flex items-center rounded-lg p-2 text-primary hover:bg-white dark:hover:bg-primary', 'bg-white dark:bg-primary' => $active]) {{$attributes->merge()}}>
    <span class="ms-3">{{ $slot }}</span>
  </a>
</li>
