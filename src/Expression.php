<?php

declare(strict_types=1);

namespace Smeghead\Nagoyaphp21;

interface Expression
{
    public function toString(): string;

    public function append(Expression $exp): Expression;
}
