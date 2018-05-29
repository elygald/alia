<?php 

namespace App\ValueObjects;

use MyCLabs\Enum\Enum;

class LeadStatus extends Enum
{
    const WAITING_CONTACT = 0;
    const WAITING_REPLY = 1;
    const LOST = 2;
    const CONVERTED = 3;
}