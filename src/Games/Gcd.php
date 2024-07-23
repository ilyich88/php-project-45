<?php

namespace Brain\Games\Games\Gcd;

use function Brain\Games\Engine\playGameAndShowResult;

use const Brain\Games\Engine\MIN_NUMBER;
use const Brain\Games\Engine\MAX_NUMBER;

function startGameGcd()
{
    $description = 'Find the greatest common divisor of given numbers.';
    $gameFunction = function () {
        $firstNum = random_int(MIN_NUMBER, MAX_NUMBER);
        $secondNum = random_int(MIN_NUMBER, MAX_NUMBER);
        $value = "{$firstNum} {$secondNum}";
        $rightAnswer = findGcd($firstNum, $secondNum);
        return [$value, (string) $rightAnswer];
    };

    playGameAndShowResult($description, $gameFunction);
}

function findGcd(int $num1, int $num2): int
{
    while (($num1 !== 0) && ($num2 !== 0)) {
        if ($num1 > $num2) {
            $num1 = $num1 % $num2;
        } else {
            $num2 = $num2 % $num1;
        }
    }
    return $num1 !== 0 ? $num1 : $num2;
}
