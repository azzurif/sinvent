<div
  {{ $attributes->merge(['class' => 'toast-entry dark:text-light-gray dark:bg-cold-black light-gray mb-4 flex w-full max-w-xs items-center transition-all transform border border-dark-gray rounded-lg bg-white p-4 text-cold-black shadow', 'role' => 'alert']) }}
  x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show">
  {{ $icon }}
  <div class="ms-3 text-sm font-normal">{{ $slot }}</div>
</div>
