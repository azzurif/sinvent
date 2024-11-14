<?php

namespace App\Livewire\Item;

use App\Livewire\Forms\ItemForm;
use App\Models\Category;
use Livewire\Component;

class Create extends Component
{
    public ItemForm $form;

    public function render()
    {
        return view('livewire.item.create', [
            'categories' => Category::all()
        ]);
    }

    public function save()
    {
        $this->form->store();

        return $this->redirectIntended(route('item.index'), true);
    }
}
