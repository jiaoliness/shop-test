<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserManagement extends Component
{

    #[On('refresh')]
    public function refresh()
    {
        $this->reset();
    }

    public function render()
    {
        Gate::authorize('user management', Role::class);

        return view('livewire.user-management', [
            'users' => User::all(),
            'roles' => Role::with('permissions')->get(),
            'permissions' => Permission::all(),
        ]);
    }
}
