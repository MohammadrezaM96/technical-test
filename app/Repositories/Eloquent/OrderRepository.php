<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface {

    private $repository;
    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function store(array $data)
    {
        $user = $this->repository->find(1);
        return $user->orders()->create($data);
    }
}
