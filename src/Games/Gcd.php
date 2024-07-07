<?php

namespace Brain\Games\Games\Gcd;

use function Brain\Games\Engine\playGameAndShowResult;

const MIN = 1;
const MAX = 100;

function startGameGcd()
{
    $description = 'Find the greatest common divisor of given numbers.';
    $gameFunction = function () {
        $firstNum = random_int(MIN, MAX);
        $secondNum = random_int(MIN, MAX);
        $value = "{$firstNum} {$secondNum}";
        $rightAnswer = findGcd($firstNum, $secondNum);
        return [$value, (string) $rightAnswer];
    };

    playGameAndShowResult($description, $gameFunction);
}

function findGcd(int $firstNum, int $secondNum): int
{
    while ($firstNum !== 0 and $secondNum !== 0) {
        if ($firstNum > $secondNum) {
            $firstNum = $firstNum % $secondNum;
        } else {
            $secondNum = $secondNum % $firstNum;
        }
        if ($firstNum !== 0) {
            return $firstNum;
        } else {
            return $secondNum;
        }
    }
}
