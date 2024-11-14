<div>
  @if (session()->has('status'))
    <x-toast class="fixed right-4 top-4 z-50">
      <x-slot:icon>
        <div class="text-green-500">
          <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
        </div>
      </x-slot:icon>
      {{ session('status') }}
    </x-toast>
  @endif

  <div class="mb-4 flex items-center justify-between">
    <x-header class="text-2xl">Categories</x-header>

    <a class="block" href="{{ route('category.create') }}" wire:navigate>
      <x-primary-button>New Category</x-primary-button>
    </a>
  </div>

  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="dark:text-light-gray w-full text-left text-sm text-dark-gray rtl:text-right">
      <thead class="dark:bg-dark-gray dark:text-light-gray bg-white text-xs uppercase text-dark-gray">
        <tr>
          <th class="px-6 py-3" scope="col">
            Category
          </th>
          <th class="px-6 py-3" scope="col">
            Description
          </th>
          <th class="px-6 py-3" scope="col">
            Action
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
          <tr class="dark:bg-cold-black dark:border-dark-gray border-b bg-white">
            <th class="dark:text-white whitespace-nowrap px-6 py-4 font-medium text-primary" scope="row">
              {{ $category->category }}
            </th>
            <td class="px-6 py-4">
              {{ $category->description }}
            </td>
            <td class="px-6 py-4">
              <button class="text-red-500 hover:text-red-700" wire:click="delete({{ $category->id }})">
                Delete
              </button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
