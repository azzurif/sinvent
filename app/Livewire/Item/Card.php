<?php

namespace App\Livewire\Item;

use App\Models\Item;
use App\Models\Rent;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class Card extends Component
{
    public Rent $rent;
    public Collection $items;

    #[On('rentUpdated')]
    public function rentUpdated()
    {}

    public function update(Rent $rent)
    {
        $rent->update(['in_date' => now()]);

        foreach ($rent->items as $item) {
            $item->increment('stock', $item->pivot->qnt);
        }

        $this->dispatch('rentUpdated')->self();
    }

    public function render()
    {
        return view('livewire.item.card', [
            'rentCount' => Rent::has('items')->count(),
        ]);
    }
}
