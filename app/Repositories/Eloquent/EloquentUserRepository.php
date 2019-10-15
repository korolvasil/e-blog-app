<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserRepository;

class EloquentUserRepository implements UserRepository
{

    public function all()
    {
        return User::all();
    }
}
