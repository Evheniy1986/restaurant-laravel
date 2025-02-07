<?php

namespace App\Livewire\Admin\Roles;

use Livewire\Component;

class RoleCrud extends Component
{


    public function render()
    {
        return view('livewire.admin.roles.role-crud')
            ->extends('layouts.admin');
    }
}
