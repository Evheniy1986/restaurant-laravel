<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RolePolicy
{

    public function create(User $user): bool
    {
        return $user->hasRole('admin');
    }


    public function update(User $user, Role $role): bool
    {
        return $user->hasRole('admin');
    }


    public function delete(User $user, Role $role): bool
    {
        return $user->hasRole('admin');
    }


}
