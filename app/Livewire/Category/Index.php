<?php

namespace App\Livewire\Category;

use App\Livewire\Forms\CategoryForm;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public CategoryForm $form;

    public function delete(Category $category)
    {
        $itemsOfCategory = $category->items()->count();

        if ($itemsOfCategory !== 0) {
            $this->js("alert('Ada items nya bang')");
        } else {
            $category->delete();
        }
    }

    public function render()
    {
        return view('livewire.category.index', [
            'categories' => Category::paginate(),
        ]);
    }
}
