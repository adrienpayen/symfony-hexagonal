<?php

namespace App\DrivenSide\Repository;

use App\Application\Port\AccountRepositoryInterface;

class AccountRepository implements AccountRepositoryInterface
{
    public function addMoney(float $money, int $accountId)
    {
        // TODO: Implement addMoney() method.
    }

    public function withdrawMoney(float $money, int $accountId)
    {
        // TODO: Implement withdrawMoney() method.
    }

    public function getBalance(int $accountId)
    {
        // TODO: Implement getBalance() method.
    }

}