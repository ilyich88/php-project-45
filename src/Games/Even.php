<?php

namespace Brain\Games\Games\Even;

use function Brain\Games\Engine\playGameAndShowResult;
use function Brain\Games\Engine\showGreetingAndGetName;

use const Brain\Games\Engine\MIN_NUMBER;
use const Brain\Games\Engine\MAX_NUMBER;

function startGameEven()
{
    $description = 'Answer "yes" if the number is even, otherwise answer "no".';
    $name = showGreetingAndGetName($description);
    $gameFunction = function () {
        $value = random_int(MIN_NUMBER, MAX_NUMBER);
        $rightAnswer = evenParity($value) ? 'yes' : 'no';
        return [$value, $rightAnswer];
    };

    playGameAndShowResult($name, $gameFunction);
}

function evenParity(int $num): bool
{
    return $num % 2 === 0;
}
