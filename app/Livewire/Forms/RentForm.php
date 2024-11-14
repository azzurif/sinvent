<?php

namespace App\Livewire\Forms;

use App\Models\Item;
use App\Models\Rent;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RentForm extends Form
{
    public ?Rent $rent;

    #[Validate(['items' => 'required|array|min:1', 'items.*' => 'required|numeric|min:1'])]
    public $items = [];

    #[Validate('nullable|date')]
    public $in_date;

    public function setRent(Rent $rent)
    {
        $this->rent = $rent;
    }

    public function store()
    {
        $this->validate();
        $rent = Rent::create(['out_date' => now()]);
        foreach ($this->items as $id => $amount) {
            $item = Item::find($id);

            if ($amount > $item->stock) {
                session()->flash('error', "Insufficient stock for $item->name");

                return;
            } else {
                $rent->items()->attach($id, ['qnt' => $amount]);
                $item->decrement('stock', $amount);
            }
        }

        $this->reset();
        return $rent;
    }

    public function update()
    {
        $this->validate();
        Rent::find($this->rent)->in_date = now();
    }
}