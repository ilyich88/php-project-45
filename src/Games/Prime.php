<?php

namespace Brain\Games\Games\Prime;

use function Brain\Games\Engine\playGameAndShowResult;

const MIN = 2;
const MAX = 100;

function startGamePrime()
{
    $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $gameFunction = function () {
        $value = random_int(MIN, MAX);
        $rightAnswer = primeNumberCheck($value);
        return [$value, $rightAnswer];
    };

    playGameAndShowResult($description, $gameFunction);
}

function primeNumberCheck(int $number)
{
    $devisor = 2;
    while (($devisor * $devisor <= $number) && ($number % $devisor !== 0)) {
        $devisor++;
    }
    return ($devisor * $devisor > $number) ? 'yes' : 'no';
}
