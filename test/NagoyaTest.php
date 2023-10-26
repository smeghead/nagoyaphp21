<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Smeghead\Nagoyaphp21\Combination;
use Smeghead\Nagoyaphp21\Number;
use Smeghead\Nagoyaphp21\Statement;

final class NagoyaTest extends TestCase
{
    public function test2たす3(): void
    {
        $n1 = new Number(2);
        $n2 = new Number(3);
        $exp = new Statement($n1, $n2);
        $this->assertSame('(2 ? 3)', $exp->toString());
    }
    public function test2たす3ひく4(): void
    {
        $n1 = new Number(2);
        $n2 = new Number(3);
        $n3 = new Number(4);

        $exp = new Statement($n1, $n2);
        $exp2 = new Statement($exp, $n3);
        $this->assertSame('((2 ? 3) ? 4)', $exp2->toString());
    }

    public function test組合せ(): void
    {
        $numbers = [1, 2, 3];
        $combinations = Combination::getCombinations($numbers);
        // var_dump($combinations); die();
        $this->assertSame('((1 ? 2) ? 3)', $combinations[0]->toString());
        $this->assertSame('(1 ? (2 ? 3))', $combinations[1]->toString());
    }
}
