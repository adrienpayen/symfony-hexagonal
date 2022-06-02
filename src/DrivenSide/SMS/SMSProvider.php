<?php

namespace App\DrivenSide\SMS;

use App\Application\Port\SMSProviderInterface;

class SMSProvider implements SMSProviderInterface
{
    public function sendMessage(int $number, int $regionCode, string $message)
    {
        // TODO: Implement sendMessage() method.
    }
}