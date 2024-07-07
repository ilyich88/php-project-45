<?php

namespace Brain\Games\Games\Even;

use function Brain\Games\Engine\playGameAndShowResult;

const MIN = 0;
const MAX = 99;

function startGameEven()
{
    $description = 'Answer "yes" if the number is even, otherwise answer "no".';
    $gameFunction = function () {
        $value = random_int(MIN, MAX);
        $rightAnswer = evenParity($value);
        return [$value, $rightAnswer];
    };

    playGameAndShowResult($description, $gameFunction);
}

function evenParity(int $num)
{
    return $num % 2 === 0 ? 'yes' : 'no';
}
