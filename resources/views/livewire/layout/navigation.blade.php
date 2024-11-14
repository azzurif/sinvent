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

<div class="dark:bg-cold-black bg-light-gray" x-data="{ open: false }">
  <nav class="dark:border-dark-gray dark:bg-cold-black dark-gray fixed top-0 z-50 w-full border-b bg-light-gray">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center gap-4">
          <!-- Hamburger -->
          <div class="-me-2 flex items-center sm:hidden">
            <button
              class="dark:text-gray-500 dark:hover:text-gray-400 dark:hover:bg-gray-900 dark:focus:bg-gray-900 dark:focus:text-gray-400 inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none"
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
                class="dark:text-white dark:bg-primary dark:hover:text-gray-300 inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-primary transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none">
                <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name">
                </div>

                <div class="ms-1">
                  <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd" />
                  </svg>
                </div>
              </button>
            </x-slot>

            <x-slot name="content">
              <x-dropdown-link :href="route('profile')" wire:navigate>
                {{ __('Profile') }}
              </x-dropdown-link>

              <!-- Authentication -->
              <button class="w-full text-start" wire:click="logout">
                <x-dropdown-link>
                  {{ __('Log Out') }}
                </x-dropdown-link>
              </button>
            </x-slot>
          </x-dropdown>
        </div>
      </div>
    </div>
  </nav>

  <aside
    class="dark:bg-cold-black dark:border-dark-gray fixed left-0 top-0 z-40 h-screen w-64 border-r border-light-gray bg-light-gray pt-20 transition-transform sm:translate-x-0"
    aria-label="Sidebar" :class="open ? 'translate-x-0' : '-translate-x-full'">
    <div class="h-full px-3 pb-4 overflow-y-auto">
      <ul class="space-y-2 font-medium">
        <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
          Dashboard
        </x-sidebar-link>
        <x-sidebar-link :href="route('category.index')" :active="request()->routeIs('category.index')" wire:navigate>
          Categories
        </x-sidebar-link>
        <x-sidebar-link :href="route('item.index')" :active="request()->routeIs('item.index')">
          Items
        </x-sidebar-link>
      </ul>
    </div>
  </aside>
</div>
