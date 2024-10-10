<?php

namespace App\Livewire\Forms;

use App\Models\Item;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ItemForm extends Form
{
    public ?Item $item;

    #[Validate('required|exists:categories,id')]
    public $category_id;

    #[Validate('required|max:255')]
    public $name;

    #[Validate('max:255')]
    public $brand;

    public $specification;

    #[Validate('required|integer|min:0')]
    public $qnt;

    public function setItem(Item $item)
    {
        $this->category_id = $item->category_id;
        $this->name = $item->name;
        $this->brand = $item->brand;
        $this->specification = $item->specification;
        $this->qnt = $item->qnt;
    }

    public function store()
    {
        $this->validate();

        $item = Item::create($this->except('item'));

        session()->flash('success', 'Item created successfully');

        $this->reset();

        return $item;
    }

    public function update()
    {
        $this->validate();

        Item::update($this->all());

        session()->flash('success', 'Item updated successfully');

        $this->reset();
    }
}
