<?php

namespace App\Livewire\Admin\Roles;

use App\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Attributes\On;
use Livewire\Component;

class RoleList extends Component
{
    use AuthorizesRequests;

    public $roles;

    public function mount()
    {
        $this->loadList();
    }

    public function edit($id)
    {
        $this->dispatch('edit-role', id: $id);
    }

    #[On('role-created')]
    public function loadList()
    {
        $this->roles = Role::all();
    }

    public function delete($id)
    {
        $role = Role::findOrFail($id);
        $this->authorize('delete', $role);
        $role->delete();
        $this->loadList();
        session()->flash('message', 'Роль удалена!');
    }

    public function render()
    {
        return view('livewire.admin.roles.role-list');
    }
}
