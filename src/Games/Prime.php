<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\playGameAndShowResult;

function isPrime(int $number):bool
{
    $devisor = 2;
    while (($devisor * $devisor <= $number) && ($number % $devisor !== 0)) {
        $devisor++;
    }
    return ($devisor * $devisor > $number);
}

function primeNumberCheck()
{
    $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $gameFunction = function () {
        $min = 2;
        $max = 100;
        $givenNumber = random_int($min, $max);
        $rightAnswer = isPrime($givenNumber) ? 'yes' : 'no';
        $value = $givenNumber;
        return [$value, $rightAnswer];
    };

    playGameAndShowResult($description, $gameFunction);
}
