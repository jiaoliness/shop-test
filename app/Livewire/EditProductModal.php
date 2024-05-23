<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;

use App\Models\{Product, Category};

use Livewire\Attributes\Validate;

use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class EditProductModal extends ModalComponent
{
    #[Validate('array')]
    public $categories = [];
    #[Validate('required')]
    public $name;
    public $brand;
    public $description;
    public $product;

    public function mount($product)
    {
        $this->product = Product::findOrFail($product);
        $this->name = $this->product->name;
        $this->brand = $this->product->brand;
        $this->description = $this->product->description;
        $this->categories = $this->product->categories->pluck('id');
    }

    public function editProduct()
    {
        Gate::authorize('update product', Role::class);

        $this->product->update([
            'name' => $this->name,
            'brand' => $this->brand,
            'description' => $this->description,
        ]);

        $this->product->categories()->sync($this->categories);

        $this->closeModal();

        $this->dispatch('refresh')->to(ViewProducts::class);
    }
    public function render()
    {
        return view('livewire.edit-product-modal', [
            'categories_list' => Category::all(),
        ]);
    }
}
