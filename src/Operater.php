<?php

declare(strict_types=1);

namespace Smeghead\Nagoyaphp21;

enum Operater: string
{
    case None = '?';
    case Addition = '+';
    case Subtraction = '-';
    case Multiplication = '*';
    case Division = '/';
}
