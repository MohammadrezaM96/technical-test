<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {

    public function find($id)
    {
        return User::find($id);
    }

    public function checkBalance($id, $amount)
    {
        return ($this->find($id)->wallet->balance < $amount)
            ? true
            : false;
    }
}
