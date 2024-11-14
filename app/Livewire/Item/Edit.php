<?php

namespace App\Livewire\Item;

use App\Livewire\Forms\ItemForm;
use App\Models\Category;
use App\Models\Item;
use Livewire\Component;

class Edit extends Component
{
    public ItemForm $form;

    public function mount(Item $item)
    {
        $this->form->setItem($item);
    }

    public function render()
    {
        return view('livewire.item.edit', [
            'item' => $this->form->item,
            'categories' => Category::all(),
        ]);
    }

    public function save()
    {
        $this->form->update();

        return $this->redirectIntended(route('item.index'), true);
    }
}
