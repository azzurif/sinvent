<?php

namespace App\Livewire\Forms;

use App\Models\Category;
use Illuminate\Validation\Rule;
use Livewire\Form;

class CategoryForm extends Form
{

    public $category;

    public $description;

    public function rules()
    {
        return [
            'category' => ['required'],
            'description' => ['required']
        ];
    }

    public function store()
    {
        $this->validate();
        Category::create($this->only(['category', 'description']));
        session()->flash('status', 'Category created successfully');
        $this->reset();
    }
}
