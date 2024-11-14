<?php

namespace App\Livewire\Category;

use App\Enums\Category;
use App\Livewire\Forms\CategoryForm;
use Livewire\Component;

class Create extends Component
{
    public CategoryForm $form;

    public function render()
    {
        return view('livewire.category.create', [
            'categories' => Category::array()
        ]);
    }

    public function save()
    {
        $this->form->store();

        return $this->redirectIntended(route('category.index'), navigate: true);
    }
}
