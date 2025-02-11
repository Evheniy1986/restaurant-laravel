<?php

namespace App\Livewire\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UserCrud extends Component
{

    use AuthorizesRequests;

    public $users;
    public $userId;

    public $name;

    public $email;

    public $password;
    public $password_confirmation;
    public $role_id;

    public $isOpen = false;

    public function load()
    {
        $this->users = User::query()->with('roles')->get();
    }

    public function create()
    {
        $this->authorize('create', Role::class);
        $this->reset();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }


    public function closeModal()
    {
        $this->isOpen = false;
        $this->reset();
    }

    public function edit($id)
    {
        $user = User::find($id);
        $this->authorize('update', $user);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = '';
        $this->role_id = $user->roles->pluck('id')->toArray();

        $this->openModal();
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', Rule::unique('users')->ignore($this->userId)],
            'password' => $this->userId ? 'nullable|string|min:6|confirmed' : 'required|string|min:6|confirmed',
            'role_id' => 'required|exists:roles,id',
        ];
    }

    public function save()
    {
        $data = $this->validate();

        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        }

        if (!empty($data['role_id'])) {
            $roleIds = $data['role_id'];
            unset($data['role_id']);
        }

        $user = User::query()->updateOrCreate(['id' => $this->userId], $data);

        if (!empty($roleIds)) {
            $user->roles()->sync($roleIds);
        }

        session()->flash('message', $this->userId ? 'User updated successfully!' : 'User created successfully!');
        $this->closeModal();
        $this->load();
    }

    public function delete($id)
    {
        $user = User::find($id);

        $this->authorize('delete', $user);
        $user->delete();
        session()->flash('message', 'User deleted successfully!');
        $this->load();
    }

    public function render()
    {
        $roles = Role::all();
        $this->load();
        return view('livewire.admin.user-crud', compact('roles'))
            ->extends('layouts.admin');
    }
}
