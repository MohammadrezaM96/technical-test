<?php

namespace App\Repositories\Interfaces;


interface WalletRepositoryInterface{

    public function find($id);

    public function update($id, array $data);

}
