<?php

namespace App\Livewire;

use App\Models\Rent;
use Livewire\Attributes\On;
use Livewire\Component;

class Dashboard extends Component
{
    #[On('rent_created')]
    public function updatedRent()
    {}

    public function render()
    {
        return view('livewire.dashboard', [
            'rents' => Rent::has('items')->with('items')->get(),
        ]);
    }
}
