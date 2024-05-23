<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use LivewireUI\Modal\ModalComponent;

class AssignRolesModal extends ModalComponent
{
    #[Rule('required|array')]
    public $permissions = [];

    #[Rule('required|array')]
    public $roles = [];

    #[Rule('required')]
    public $user_id;

    public function mount($user)
    {
        $this->user_id = $user;
        $this->updatedUserId();
    }

    public function updatedUserId()
    {
        if ($this->user_id) {
            $user = User::where('id', $this->user_id)->with('roles')->first();

            $this->roles = $user->roles->pluck('name');
            $this->permissions = $user->permissions->pluck('name')->all();
        } else {
            $this->reset('permissions', 'roles', 'user_id');
        }
    }

    public function saveRoles()
    {
        //Gate::authorize('Role: assign', Permission::class);
        $user = User::find($this->user_id);

        $user->syncPermissions($this->permissions);
        $user->syncRoles($this->roles);

        $this->closeModal();

        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        $this->reset('permissions', 'roles', 'user_id');

        $this->dispatch('refresh')->to(UserManagement::class);
    }

    public function render()
    {
        return view('livewire.assign-roles-modal', [
            'roles_initial' => Role::all(),
            'permissions_initial' => Permission::all(),
            'users' => User::with('roles', 'permissions')->get(),
        ]);
    }
}
