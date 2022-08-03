<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\InvalidWalletBalanceException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreOrderRequest;
use App\Repositories\Eloquent\OrderRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Eloquent\WalletRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Throwable;

class OrderController extends Controller
{

    private $orderRepository;
    private $userRepository;
    private $walletRepository;

    public function __construct(OrderRepository $orderRepository, UserRepository $userRepository, WalletRepository $walletRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->walletRepository = $walletRepository;
    }

    /**
     * @param StoreOrderRequest $request
     * @return mixed
     * @throws Throwable
     */
    public function store(StoreOrderRequest $request)
    {
        try {
            throw_if($this->userRepository->checkBalance(1, $request->amount), new InvalidWalletBalanceException());
            $userWalletId = $this->userRepository->find(1)->wallet->id;
            $this->walletRepository->update($userWalletId, [
                'balance' => $this->walletRepository->find($userWalletId)->balance - $request->amount
            ]);
            return $this->orderRepository->store(Arr::except($request->validated(), ['wallet_id']));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
