<?php 

namespace App\ValueObjects;

use MyCLabs\Enum\Enum;

class OrderStatus extends Enum
{
    const WAITING = 0;
    const DONE = 1;
}