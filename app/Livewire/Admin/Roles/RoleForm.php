<?php

namespace App\Livewire\Admin\Roles;

use App\Models\Role;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class RoleForm extends Component
{
    #[Validate('required|string|max:255|unique:roles,role')]
    public $role;
    public $roleId;

    #[On('edit-role')]
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $this->roleId = $role->id;
        $this->role = $role->role;
    }

    public function resetForm()
    {
        $this->roleId = null;
        $this->role = '';
    }

    public function save()
    {
        $data = $this->validate();

        Role::query()->updateOrCreate(['id' => $this->roleId], $data);

        session()->flash('message', $this->roleId ? 'Role updated successfully!' : 'Role created successfully!');
        $this->dispatch('role-created');
        $this->resetForm();
    }

    public function render()
    {
        return view('livewire.admin.roles.role-form');
    }
}
