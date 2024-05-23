<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;

use App\Models\Category;

use Livewire\Attributes\Validate;

use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class CategoryModal extends ModalComponent
{

    #[Validate('required')]
    public $name = '';

    public $category;

    public $id;

    public function mount($id = NULL)
    {
        if ($id !== NULL) {
            $this->category = Category::findOrFail($id);
            $this->name = $this->category->name;
        }
    }

    public function addCategory()
    {
        Gate::authorize('create category', Role::class);

        $this->validate();

        Category::create([
            'name' => $this->name,
        ]);

        $this->closeModal();

        $this->dispatch('refresh');
    }

    public function editCategory()
    {
        Gate::authorize('update category', Role::class);

        $this->validate();

        $this->category->update([
            'name' => $this->name,
        ]);

        $this->closeModal();

        $this->dispatch('refresh');
    }

    public function render()
    {
        return view('livewire.category-modal', [
            'categories_list' => Category::all(),
        ]);
    }
}
