<?php

namespace App\Livewire\Item;

use App\Models\Item;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[On('itemCreated')]
    public function updateItems($item)
    {
        
    }

    public function render()
    {
        return view('livewire.item.index', [
            'items' => Item::with('category')->paginate(15),
        ]);
    }
}
