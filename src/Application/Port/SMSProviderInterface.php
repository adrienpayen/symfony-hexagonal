<?php

namespace App\Application\Port;

interface SMSProviderInterface
{
    public function sendMessage(int $number, int $regionCode, string $message);
}