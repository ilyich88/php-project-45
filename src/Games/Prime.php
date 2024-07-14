<?php

namespace Brain\Games\Games\Prime;

use function Brain\Games\Engine\playGameAndShowResult;
use function Brain\Games\Engine\showGreetingAndGetName;

use const Brain\Games\Engine\MIN_NUMBER;
use const Brain\Games\Engine\MAX_NUMBER;

function startGamePrime()
{
    $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $name = showGreetingAndGetName($description);
    $gameFunction = function () {
        $value = random_int(MIN_NUMBER, MAX_NUMBER);
        $rightAnswer = primeNumberCheck($value) ? 'yes' : 'no';
        return [$value, $rightAnswer];
    };

    playGameAndShowResult($name, $gameFunction);
}

function primeNumberCheck(int $number)
{
    if ($number <= 1) {
        return false;
    }
    $devisor = 2;
    while (($devisor * $devisor <= $number) && ($number % $devisor !== 0)) {
        $devisor++;
    }
    return ($devisor * $devisor > $number);
}
