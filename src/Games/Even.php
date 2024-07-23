<?php

namespace Brain\Games\Games\Even;

use function Brain\Games\Engine\playGameAndShowResult;

use const Brain\Games\Engine\MIN_NUMBER;
use const Brain\Games\Engine\MAX_NUMBER;

function startGameEven()
{
    $description = 'Answer "yes" if the number is even, otherwise answer "no".';
    $gameFunction = function () {
        $value = random_int(MIN_NUMBER, MAX_NUMBER);
        $rightAnswer = isEven($value) ? 'yes' : 'no';
        return [$value, $rightAnswer];
    };

    playGameAndShowResult($description, $gameFunction);
}

function isEven(int $num): bool
{
    return $num % 2 === 0;
}
