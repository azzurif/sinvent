<?php

namespace App\Enums;
use Kongulov\Traits\InteractWithEnum;

enum CategoryEnum: string
{
    use InteractWithEnum;

    case A = 'Alat';
    case M = 'Modal';
    case BHP = 'Bahan habis pakai';
    case BTHP = 'Bahan tidak habis pakai';
}
