<?php

namespace App\Livewire\Item;

use App\Livewire\Forms\ItemForm;
use App\Models\Category;
use Livewire\Component;

class Create extends Component
{
    public ItemForm $form;

    public function save()
    {
        $item = $this->form->store();

        $this->dispatch('itemCreated', item: $item->id);

        $this->dispatch('close');
    }

    public function render()
    {
        return view('livewire.item.create', [
            'categories' => Category::all(),
        ]);
    }
}
