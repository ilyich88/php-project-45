<?php

namespace Brain\Games\Gcd;

use function Brain\Games\Engine\playGameAndShowResult;

function findGcd()
{
    $description = 'Find the greatest common divisor of given numbers.';
    $gameFunction = function () {
        $min = 2;
        $max = 100;
        $firstNum = random_int($min, $max);
        $secondNum = random_int($min, $max);
        $value = "{$firstNum} {$secondNum}";
        while ($firstNum !== 0 and $secondNum !== 0) {
            if ($firstNum > $secondNum) {
                $firstNum = $firstNum % $secondNum;
            } else {
                $secondNum = $secondNum % $firstNum;
            }
            if ($firstNum !== 0) {
                $rightAnswer = $firstNum;
            } else {
                $rightAnswer = $secondNum;
            }
        }
        return [$value, (string) $rightAnswer];
    };

    playGameAndShowResult($description, $gameFunction);
}
