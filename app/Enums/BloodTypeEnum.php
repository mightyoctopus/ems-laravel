<?php

namespace App\Enums;

/* case property is not usable due to its PHP version 
(it's supported for above PHP 8.0) */
class BloodTypeEnum
{
    const A = 'A';
    const B = 'B';
    const AB = 'AB';
    const O = 'O';

    public static function getBloodTypes(): array
    {
        return [
            self::A,
            self::B,
            self::AB,
            self::O,
        ];
    }
}


