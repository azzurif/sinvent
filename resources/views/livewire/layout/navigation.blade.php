<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<div x-data="{ open: false }">
  <nav class="dark:bg-cold-black dark:border-dark-gray border-white-gray fixed top-0 z-50 w-full border-b bg-light-gray">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex">
          {{-- Humberger --}}
          <div class="me-2 flex items-center sm:hidden">
            <button
              class="dark:text-light-gray dark:hover:bg-primary dark:focus:bg-primary inline-flex items-center justify-center rounded-md p-2 text-primary transition duration-150 ease-in-out hover:bg-white hover:text-gray-500 focus:bg-white focus:outline-none"
              @click="open = ! open">
              <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="inline-flex" :class="{ 'hidden': open, 'inline-flex': !open }" stroke-linecap="round"
                  stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path class="hidden" :class="{ 'hidden': !open, 'inline-flex': open }" stroke-linecap="round"
                  stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
          <!-- Logo -->
          <div class="flex shrink-0 items-center">
            <a href="{{ route('dashboard') }}" wire:navigate>
              <x-application-logo class="dark:text-light-gray block h-9 w-auto fill-current text-dark-gray" />
            </a>
          </div>
        </div>

        <!-- Settings Dropdown -->
        <div class="sm:ms-6 sm:flex sm:items-center">
          <x-dropdown align="right" width="48">
            <x-slot name="trigger">
              <button
                class="dark:text-white dark:bg-primary inline-flex items-center rounded-md border border-transparent bg-light-gray px-3 py-2 text-sm font-medium leading-4 text-primary transition duration-150 ease-in-out focus:outline-none">
                <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name">
                </div>

                <div class="ms-1">
                  <x-arrow />
                </div>
              </button>
            </x-slot>

            <x-slot name="content">
              <x-dropdown-item>
                <a class="block w-full" href="{{ route('profile') }}" wire:navigate>
                  {{ __('Profile') }}
                </a>
              </x-dropdown-item>

              <!-- Authentication -->
              <button class="block w-full text-start" wire:click="logout">
                <x-dropdown-item>
                  {{ __('Log Out') }}
                </x-dropdown-item>
              </button>
            </x-slot>
          </x-dropdown>
        </div>
      </div>
    </div>
  </nav>

  <aside
    class="dark:bg-cold-black dark:border-dark-gray fixed left-0 top-0 z-40 h-screen w-56 -translate-x-full transform border-r border-t border-white bg-light-gray pt-16 transition-transform ease-in-out sm:translate-x-0 md:block md:w-64"
    :class="open ? 'translate-x-0' : '-translate-x-full'">
    <div class="dark:bg-cold-black h-full overflow-y-auto bg-light-gray px-3 pb-4 pt-2">
      <ul class="relative h-full space-y-2 font-normal md:font-medium">
        <x-sidebar-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">Dashboard</x-sidebar-link>
        <x-sidebar-link href="{{ route('category.index') }}" :active="request()->routeIs('category.*')">Categories</x-sidebar-link>
        <x-sidebar-link href="{{ route('item.index') }}" :active="request()->routeIs('item.*')">Items</x-sidebar-link>

        <button
          class="dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-700 rounded-lg p-2.5 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-200"
          id="theme-toggle" type="button">
          <svg class="hidden h-5 w-5" id="theme-toggle-dark-icon" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
          </svg>
          <svg class="hidden h-5 w-5" id="theme-toggle-light-icon" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
              fill-rule="evenodd" clip-rule="evenodd"></path>
          </svg>
        </button>

        {{-- Toggle theme --}}
        {{-- <div class="absolute bottom-0 sm:flex sm:items-center" x-data="{ theme: 'Auto' }" x-init="$watch('theme', value => console.log(value))">
          <x-dropdown align="left" position="top">
            <x-slot name="trigger">
              <button
                class="dark:text-white dark:bg-primary inline-flex items-center rounded-md border border-transparent bg-light-gray px-3 py-2 text-sm leading-4 text-primary transition duration-150 ease-in-out focus:outline-none">
                <strong x-text="theme"></strong>

                <div class="ms-1">
                  <x-arrow class="rotate-180" />
                </div>
              </button>
            </x-slot>

            <x-slot name="content">
              <button class="flex w-full items-center text-start"
                @click.prevent="theme = 'Dark'; localStorage.theme = 'dark'">
                <x-dropdown-item>
                  Dark
                </x-dropdown-item>
              </button>

              <button class="w-full text-start" @click.prevent="theme = 'Light'; localStorage.theme = 'light'">
                <x-dropdown-item>
                  Light
                </x-dropdown-item>
              </button>

              <button class="w-full text-start" @click.prevent="theme = 'Auto'; localStorage.removeItem('theme')">
                <x-dropdown-item>
                  Auto
                </x-dropdown-item>
              </button>
            </x-slot>
          </x-dropdown>
        </div> --}}
      </ul>
    </div>
  </aside>
</div>

<script>
  let themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
  let themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

  // Change the icons inside the button based on previous settings
  if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia(
      '(prefers-color-scheme: dark)').matches)) {
    themeToggleLightIcon.classList.remove('hidden');
  } else {
    themeToggleDarkIcon.classList.remove('hidden');
  }

  let themeToggleBtn = document.getElementById('theme-toggle');

  themeToggleBtn.addEventListener('click', function() {

    // toggle icons inside button
    // themeToggleDarkIcon.classList.toggle('hidden');
    // themeToggleLightIcon.classList.toggle('hidden');

    // if set via local storage previously
    if (localStorage.getItem('theme')) {
      if (localStorage.getItem('theme') === 'light') {
        document.documentElement.classList.add('dark');
        localStorage.setItem('theme', 'dark');
      } else {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('theme', 'light');
      }

      // if NOT set via local storage previously
    } else {
      if (document.documentElement.classList.contains('dark')) {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('theme', 'light');
      } else {
        document.documentElement.classList.add('dark');
        localStorage.setItem('theme', 'dark');
      }
    }
  });
</script>
