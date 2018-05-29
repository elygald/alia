<?php 

namespace App\ValueObjects;

use MyCLabs\Enum\Enum;

class LeadStatus extends Enum
{
    const WHATSAPP = 0;
    const EMAIL = 1;
    const MESSENGER = 2;
    const PHONE = 3;
}