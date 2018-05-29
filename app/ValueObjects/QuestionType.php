<?php 

namespace App\ValueObjects;

use MyCLabs\Enum\Enum;

class QuestionType extends Enum
{
    const TEXT = 0;
    const OPTIONS = 1;
}