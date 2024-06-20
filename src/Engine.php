<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function playGameAndShowResult(string $description, callable $gameFunction)
{
    line("Welcome to the Brain Game!");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($description);
    $maxRound = 3;
    for ($roundNum = 0; $roundNum < $maxRound; $roundNum++) {
        [$value, $rightAnswer] = $gameFunction();
        line("Question: $value");
        $answer = prompt('Your answer');
        if ($answer === $rightAnswer) {
            line('Correct!');
        } else {
            return line("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.
            \rLet's try again, {$name}!");
        }
    }
    line("Congratulations, %s!", $name);
}
