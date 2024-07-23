<?php

namespace Brain\Games\Games\Prime;

use function Brain\Games\Engine\playGameAndShowResult;

use const Brain\Games\Engine\MIN_NUMBER;
use const Brain\Games\Engine\MAX_NUMBER;

function startGamePrime()
{
    $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $gameFunction = function () {
        $value = random_int(MIN_NUMBER, MAX_NUMBER);
        $rightAnswer = isPrime($value) ? 'yes' : 'no';
        return [$value, $rightAnswer];
    };

    playGameAndShowResult($description, $gameFunction);
}

function isPrime(int $number): bool
{
    if ($number <= 1) {
        return false;
    }
    $divisor = 2;
    while (($divisor * $divisor <= $number) && ($number % $divisor !== 0)) {
        $divisor++;
    }
    return ($divisor * $divisor > $number);
}
