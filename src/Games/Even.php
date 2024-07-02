<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\playGameAndShowResult;

function parityCheck()
{
    $description = 'Answer "yes" if the number is even, otherwise answer "no".';
    $gameFunction = function () {
        $min = 0;
        $max = 99;
        $value = random_int($min, $max);
        $rightAnswer = $value % 2 === 0 ? 'yes' : 'no';
        return [$value, $rightAnswer];
    };

    playGameAndShowResult($description, $gameFunction);
}
