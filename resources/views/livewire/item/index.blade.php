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
  
  @if (session()->has('error'))
    <x-toast class="fixed right-4 top-4 z-50">
      <x-slot:icon>
        <div class="text-red-500">
          <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
          </svg>
        </div>
      </x-slot:icon>
      {{ session('error') }}
    </x-toast>
  @endif

  <div class="mb-4 flex items-center justify-between">
    <x-header class="text-2xl">Items Available</x-header>

    <a class="block" href="{{ route('item.create') }}" wire:navigate>
      <x-primary-button>New Item</x-primary-button>
    </a>
  </div>

  <form wire:submit.prevent="rent">
    <div class="flex items-center justify-between">
      <div>
        <x-primary-button
          x-show="$wire.form.items.length > 0" x-cloak>
          Rent
          <div wire:loading>...</div>
        </x-primary-button>
      </div>

      <div>
        <x-text-input class="mb-4 block h-10 w-64" type="search" placeholder="Search items..."
          wire:model.live.debounce.200ms="search" />
      </div>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <table class="dark:text-light-gray mb-4 w-full rounded-md text-left text-sm text-dark-gray rtl:text-right">
        <thead class="dark:bg-dark-gray dark:text-light-gray bg-white text-xs uppercase text-dark-gray">
          <tr>
            <th class="px-6 py-3" scope="col">
            </th>
            <th class="px-6 py-3" scope="col">
              Category
            </th>
            <th class="px-6 py-3" scope="col">
              Name
            </th>
            <th class="px-6 py-3" scope="col">
              Specification
            </th>
            <th class="px-6 py-3" scope="col">
              Stock
            </th>
            <th class="px-6 py-3" scope="col">
              Action
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($items as $item)
            <tr class="dark:bg-cold-black dark:border-dark-gray border-b bg-white" x-data>
              <td class="inline-flex items-center gap-2 px-6 py-4">
                <div>
                  <x-checkbox name="item-{{ $item->id }}" value="{{ $item->id }}"
                    wire:model="form.items.{{ $item->id }}" />
                  <x-input-error class="mt-2" :messages="$errors->get('form.items')" />
                </div>

                <div class="max-w-10 h-8">
                  <x-input-number class="max-w-10 h-8" name="amount-{{ $item->id }}" placeholder="10" x-cloak
                    x-show="$wire.form.items[{{ $item->id }}]" wire:model="form.items.{{ $item->id }}" />
                  <x-input-error class="mt-2" :messages="$errors->get('form.items.{{ $item->id }}')" />
                </div>
              </td>
              <th class="dark:text-white whitespace-nowrap px-6 py-4 font-medium text-primary" scope="row">
                {{ $item->category->category }}
              </th>
              <td class="px-6 py-4">
                {{ $item->name }}
              </td>
              <td class="px-6 py-4">
                {{ str($item->specification)->limit(60) }}
              </td>
              <td class="px-6 py-4">
                {{ $item->stock }}
              </td>
              <td class="inline-flex items-center gap-2 px-6 py-4">
                <a class="text-light-blue" href="{{ route('item.edit', $item) }}" wire:navigate>
                  Edit
                </a>

                <button class="text-red-500 hover:text-red-700" type="button"
                  wire:click="delete({{ $item->id }})">
                  Delete
                </button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
  </form>
</div>
