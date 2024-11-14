<div>
  <a href="{{ route('item.index') }}">
    <x-primary-button>Start Rent Items</x-primary-button>
  </a>

  <div class="grid grid-cols-1 md:grid-cols-4 mt-4 gap-3">
    @foreach ($rents as $rent)
      <livewire:item.card :$rent :items="$rent->items" :key="$rent->id" />
    @endforeach
  </div>
</div>
