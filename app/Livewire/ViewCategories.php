<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use Livewire\Attributes\On;
use App\Models\Category;

class ViewCategories extends Component
{
    use WithPagination;

    #[On('refresh')]
    public function refresh()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.view-categories', [
            'categories' => Category::latest()->paginate(10),
        ]);
    }
}
