<?php

declare(strict_types=1);

namespace Smeghead\Nagoyaphp21;

final class Number implements Expression
{
    public function __construct(
        private int $value
    ) {
    }

    public function toString(): string
    {
        return sprintf('%d', $this->value);
    }

    public function append(Expression $exp): Expression
    {
        return new Statement($this, $exp);
    }
}
