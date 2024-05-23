<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;

use App\Models\{Product, Category};

use Livewire\Attributes\{Validate, On};

use Illuminate\Support\Facades\Gate;

use Spatie\Permission\Models\Role;

class AddProductModal extends ModalComponent
{
    #[Validate('array')]
    public $categories = [];

    #[Validate('required')]
    public $name = '';

    public $brand = '';
    public $description = '';

    public $categories_list;

    public function addProduct()
    {
        Gate::authorize('create product', Role::class);

        $this->validate();

        Product::create([
            'name' => $this->name,
            'brand' => $this->brand,
            'description' => $this->description
        ])->categories()->attach($this->categories);

        $this->closeModal();

        $this->dispatch('refresh')->to(ViewProducts::class);
    }

    #[On('refreshCategories')]
    public function refresh()
    {
        $this->categories_list = Category::all();
    }

    public function mount()
    {
        $this->categories_list = Category::all();
    }

    public function render()
    {
        return view('livewire.add-product-modal');
    }
}
