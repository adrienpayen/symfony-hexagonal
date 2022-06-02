<?php

namespace App\DrivingSide\API;

use App\Application\Port\MoneyTransactionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoneyTransactionController extends AbstractController
{
    private MoneyTransactionInterface $moneyTransaction;

    public function __construct(MoneyTransactionInterface $moneyTransaction)
    {
        $this->moneyTransaction = $moneyTransaction;
    }

    #[Route(path: '/accounts/{accountId}/balance', methods: ['GET'])]
    public function getBalance(int $accountId): JsonResponse
    {
        $balance = $this->moneyTransaction->getBalance($accountId);

        return $this->json(['balance' => $balance], Response::HTTP_OK);
    }

    #[Route(path: '/accounts/{accountId}/deposit', methods: ['POST'])]
    public function deposit(Request $request, int $accountId): JsonResponse
    {
        $payload = json_decode($request->getContent());
        $this->moneyTransaction->deposit($payload['money'], $accountId);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }

    #[Route(path: '/accounts/{accountId}/withdraw', methods: ['POST'])]
    public function withdraw(Request $request, int $accountId): JsonResponse
    {
        $payload = json_decode($request->getContent());
        $this->moneyTransaction->withdraw($payload['money'], $accountId);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }
}