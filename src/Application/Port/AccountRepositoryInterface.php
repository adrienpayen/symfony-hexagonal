<?php

namespace App\Application\Port;

interface AccountRepositoryInterface
{
    public function addMoney(float $money, int $accountId);
    public function withdrawMoney(float $money, int $accountId);
    public function getBalance(int $accountId);
}