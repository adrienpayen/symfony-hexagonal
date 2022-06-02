<?php

namespace App\Application\Services;

use App\Application\Port\AccountRepositoryInterface;
use App\Application\Port\MoneyTransactionInterface;
use App\Application\Port\SMSProviderInterface;

class MoneyTransactionService implements MoneyTransactionInterface
{
    private AccountRepositoryInterface $accountRepository;
    private SMSProviderInterface $SMSProvider;

    public function __construct(AccountRepositoryInterface $accountRepository, SMSProviderInterface $SMSProvider)
    {
        $this->accountRepository = $accountRepository;
        $this->SMSProvider       = $SMSProvider;
    }

    public function deposit(float $money, int $accountId)
    {
        $this->accountRepository->addMoney($money, $accountId);
    }

    public function withdraw(float $money, int $accountId)
    {
        $this->accountRepository->withdrawMoney($money, $accountId);
        $number = 1; // todo: implement some logic to get user number.
        $regionCode = 1; // todo: implement some logic to get user number region code.
        $balance = $this->accountRepository->getBalance($accountId);
        $this->SMSProvider->sendMessage($number, $regionCode, "You have withdraw $money$. Your current balance is : $balance");
    }

    public function getBalance(int $accountId) :float
    {
        return $this->accountRepository->getBalance($accountId);
    }
}