<?php

namespace App\Livewire\Item;

use App\Livewire\Forms\RentForm;
use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public RentForm $form;
    public string $search = '';

    public function delete(Item $item)
    {
        $item->delete();
    }

    public function rent()
    {
        $this->form->store();

        $this->dispatch('rent_created');
    }

    public function render()
    {
        $items = Item::query()
            ->when($this->search, function ($query, $search) {
                $query->whereFullText(['name', 'specification'], $search);
            }, function ($query) {
                $query->with('category');
            });

        return view('livewire.item.index', [
            'items' => $items->limit(20)->get(),
        ]);
    }
}
