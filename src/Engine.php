<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function playGameAndShowResult(string $description, callable $gameFunction)
{
    line("Welcome to the Brain Games!");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($description);
    define("MAX_ROUND", 3);
    $gameStatus = true;
    for ($roundNum = 0; ($roundNum < MAX_ROUND) && $gameStatus; $roundNum++) {
        [$value, $rightAnswer] = $gameFunction();
        line("Question: $value");
        $answer = prompt('Your answer');
        if ($answer === $rightAnswer) {
            line('Correct!');
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
            $gameStatus = false;
        }
    }
    if ($gameStatus) {
        line("Congratulations, %s!", $name);
    } else {
        line("Let's try again, {$name}!");
    }
}
