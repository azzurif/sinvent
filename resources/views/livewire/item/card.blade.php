<div
  class="dark:bg-cold-black dark:border-dark-gray max-w-xs rounded-lg border border-light-gray bg-white px-4 py-2 shadow">
  <div class="inline-flex w-full items-center justify-between">
    <p class="text-sm">
      {{ !$rent->in_date ? $rent->out_date->diffForHumans() : 'Returned ' . $rent->in_date->diffForHumans() }}
    </p>

    @if (!$rent->in_date)
      <button class="text-sm text-green-500" type="button" wire:click="update({{ $rent->id }})">Kembalikan</button>
    @endif
  </div>

  <ul class="dark:text-light-gray relative list-inside list-disc space-y-1 text-sm text-primary">
    @foreach ($items->take(3) as $item)
      <li>{{ str($item->name)->limit(20) }}</li>
    @endforeach
    <button type="button" @class([
        'text-sm text-light-blue',
        'absolute bottom-0 right-0' => $items->count() >= 3,
    ]) x-data=""
      @click.prevent="$dispatch('open-modal', 'open-detail-{{ $rent->id }}')">
      see details
    </button>
  </ul>

  <x-modal name="open-detail-{{ $rent->id }}" :show="$errors->isNotEmpty()" focusable>
    <div class="relative p-4">
      <h2 class="dark:text-white text-lg font-medium text-primary">
        {!! !$rent->in_date
            ? $rent->out_date->diffForHumans()
            : 'Returned ' .
                $rent->out_date->diffForHumans() .
                '<span class="pl-2 inline-flex align-middle text-green-500"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg></span>
                ' !!}
      </h2>

      <ul class="dark:text-light-gray relative list-inside list-disc space-y-1 text-cold-black">
        @foreach ($items->take(3) as $item)
          <li>{{ str($item->name)->limit(20) }} - {{ $item->pivot?->qnt }}pcs</li>
        @endforeach
      </ul>

      <button class="absolute right-4 top-4" type="button" @click=$dispatch('close')>
        <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </x-modal>
</div>
