<?php

declare(strict_types=1);

namespace Smeghead\Nagoyaphp21;

final class Statement implements Expression
{
    private Operater $op = Operater::None;
    public function __construct(
        private readonly Expression $a,
        private readonly Expression $b
    ) {
    }

    public function toString(): string
    {
        return sprintf('(%s %s %s)', $this->a->toString(), $this->op->value, $this->b->toString());
    }

    public function append(Expression $exp): Expression
    {
        return new Statement($this, $exp);
    }
}
