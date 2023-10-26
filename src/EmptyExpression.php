<?php

declare(strict_types=1);

namespace Smeghead\Nagoyaphp21;

final class EmptyExpression implements Expression
{
    public function __construct()
    {
    }

    public function toString(): string
    {
        return '';
    }

    public function append(Expression $exp): Expression
    {
        return $exp;
    }
}
