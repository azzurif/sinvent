<?php

namespace App\Livewire\Forms;

use App\Models\Item;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ItemForm extends Form
{
    public ?Item $item;

    #[Validate('required|exists:categories,id')]
    public $category;

    #[Validate('required|string|max:255')]
    public $name;

    #[Validate('required|numeric')]
    public $stock;

    #[Validate('nullable')]
    public $specification;

    #[Validate('nullable')]
    public $merk;

    #[Validate('nullable')]
    public $seri;


    public function setItem(Item $item)
    {
        $this->item = $item;
        $this->category = $item->category_id;
        $this->name = $item->name;
        $this->stock = $item->stock;
        $this->specification = $item->specification;
        $this->merk = $item->merk;
        $this->seri = $item->seri;
    }

    public function store()
    {
        $this->validate();
        Item::create([
            'category_id' => $this->category,
            'name' => $this->name,
            'stock' => $this->stock,
            'specification' => $this->specification,
            'merk' => $this->merk,
            'seri' => $this->seri,
        ]);
        session()->flash('status', 'Item created successfully');
        $this->reset();
    }

    public function update()
    {
        $this->validate();
        $this->item->update([
            'category_id' => $this->category,
            'name' => $this->name,
            'stock' => $this->stock,
            'merk' => $this->merk,
            'seri' => $this->seri,
        ]);
        session()->flash('status', "$this->name updated successfully");
        $this->reset();
    }
}
