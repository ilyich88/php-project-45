<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const MIN_NUMBER = 0;
const MAX_NUMBER = 100;
const MAX_ROUND = 3;

function showGreetingAndGetName(string $description): string
{
    line("Welcome to the Brain Games!");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($description);
    return $name;
}

function playGameAndShowResult(string $name, callable $gameFunction)
{
    for ($roundNum = 0; $roundNum < MAX_ROUND; $roundNum++) {
        [$value, $rightAnswer] = $gameFunction();
        line("Question: $value");
        $answer = prompt('Your answer');
        if ($answer === $rightAnswer) {
            line('Correct!');
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.
            \rLet's try again, {$name}!");
            return;
        }
        line("Congratulations, %s!", $name);
    }
}
