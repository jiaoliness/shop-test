<?php

namespace App\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Product;

class ViewProducts extends Component
{
    use WithPagination;

    #[On('refresh')]
    public function refresh()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.view-products', [
            'products' => Product::latest()->paginate(10),
        ]);  
    }
}
