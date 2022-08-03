<?php

namespace App\Repositories\Interfaces;


interface UserRepositoryInterface{

    public function find($id);

    public function checkBalance($id, int $amount);
}
