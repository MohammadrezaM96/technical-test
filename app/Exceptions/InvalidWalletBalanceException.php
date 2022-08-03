<?php

namespace App\Exceptions;

use Exception;

class InvalidWalletBalanceException extends Exception
{
    public function __construct($message = null, $code = 403, Throwable $previous = null)
    {
        $message = $message ?? __('validation.exceptions.InvalidWalletBalanceException');
        parent::__construct($message, $code, $previous);
    }
}
