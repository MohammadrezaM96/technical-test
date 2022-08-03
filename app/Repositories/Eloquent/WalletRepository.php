<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Models\Wallet;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\WalletRepositoryInterface;

class WalletRepository implements WalletRepositoryInterface {

    public function find($id)
    {
        return Wallet::find($id);
    }

    public function update($id, $data)
    {
        return Wallet::find($id)->update($data);
    }
}
