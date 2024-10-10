<x-app-layout>
  <x-slot name="header">
    <h2 class="dark:text-white text-xl font-semibold leading-tight text-primary">
      {{ __('Profile') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
      <div class="dark:bg-cold-black bg-light-gray p-4 shadow sm:rounded-lg sm:p-8">
        <div class="max-w-xl">
          <livewire:profile.update-profile-information-form />
        </div>
      </div>

      <div class="dark:bg-cold-black bg-light-gray p-4 shadow sm:rounded-lg sm:p-8">
        <div class="max-w-xl">
          <livewire:profile.update-password-form />
        </div>
      </div>

      <div class="dark:bg-cold-black bg-light-gray p-4 shadow sm:rounded-lg sm:p-8">
        <div class="max-w-xl">
          <livewire:profile.delete-user-form />
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
