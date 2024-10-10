<div x-data="">
  <div class="mb-2 flex items-center justify-between">
    <x-header>
      List Items
    </x-header>

    <x-primary-button x-on:click.prevent="$dispatch('open-modal', 'open-create-item-modal')">
      New Item
    </x-primary-button>
  </div>

  {{-- Create item modal --}}
  <x-modal name="open-create-item-modal" :show="$errors->isNotEmpty()" focusable>
    <livewire:item.create />
  </x-modal>

  <div>
    @foreach ($items as $item)
      <livewire:item.card :item="$item" wire:key="{{ $item->id }}" />
    @endforeach
  </div>

  {{ $items->links() }}
</div>
