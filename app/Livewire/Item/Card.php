<?php

namespace App\Livewire\Item;

use App\Models\Item;
use Livewire\Component;

class Card extends Component
{
    public Item $item;
    public function render()
    {
        return view('livewire.item.card');
    }
}
