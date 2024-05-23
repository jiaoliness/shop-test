<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;

use App\Models\{Product, Category};

use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class DeleteProductModal extends ModalComponent
{
    public $model;
    public $id;
    public $object;
    public $name;

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }

    public function mount($model, $id)
    {
        $this->object = $model == 'product' ? Product::findOrFail($id) : Category::findOrFail($id);
        $this->name = $this->object->name;
        $this->model = $model;
    }

    public function deleteProduct()
    {
        Gate::authorize('delete ' . $this->model, Role::class);

        $this->object->delete();
        $this->closeModal();

        $this->dispatch('refresh');
    }

    public function render()
    {
        return view('livewire.delete-product-modal');
    }
}
