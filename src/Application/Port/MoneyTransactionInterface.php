<?php

namespace App\Application\Port;

interface MoneyTransactionInterface
{
    public function deposit(float $money, int $accountId);
    public function withdraw(float $money, int $accountId);
    public function getBalance(int $accountId): float;
}