<?php

declare(strict_types=1);

namespace Smeghead\Nagoyaphp21;

final class Combination
{
    /**
     * @param int[] $numbers 構成する数字
     * @return Expression[] 組合せ
     */
    public static function getCombinations(array $numbers): array
    {
        return getCombinationsRec($numbers, new EmptyExpression(), []);
    }
}

/**
 * @param int[] $numbers
 * @param Expression[] $acc
 * @return Expression[]
 */
function getCombinationsRec(array $numbers, Expression $exp, array $acc): array
{
    if (count($numbers) === 0) {
        return expression_append($acc, $exp);
    }
    $n1 = array_shift($numbers);
    $result1 = getCombinationsRec($numbers, $exp->append(new Number($n1)), $acc);
    // var_dump('$result1');
    // var_dump($result1);
    if (count($numbers) > 0) {
        $n2 = array_shift($numbers);
        $result2 = getCombinationsRec($numbers, $exp->append(new Statement(new Number($n1), new Number($n2))), $acc);
        // var_dump('$result2');
        // var_dump($result2);
        $result1 = expression_unique($result1, $result2);
    }
    return $result1;
}

/**
 * @param Expression[] $items
 * @return Expression[]
 */
function expression_append(array $items, Expression $exp): array
{
    $items[] = $exp;
    return $items;
}

/**
 * @param Expression[] $exps1
 * @param Expression[] $exps2
 * @return Expression[]
 */
function expression_unique(array $exps1, array $exps2): array
{
    $result = [];
    foreach ($exps1 as $e) {
        $result[$e->toString()] = $e;
    }
    foreach ($exps2 as $e) {
        $result[$e->toString()] = $e;
    }
    return array_values($result);
}
