<?php

namespace App\Livewire\Rent;

use App\Livewire\Forms\RentForm;
use App\Models\Item;
use Livewire\Component;

class Create extends Component
{
    public RentForm $form;

    public function save()
    {
        $rent = $this->form->store();

        $this->dispatch('rent_created', $rent->item_id);
    }

    public function render()
    {
        return view('livewire.rent.create');
    }
}
