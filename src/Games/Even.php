<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function evenParity()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < 3; $i++) {
        $num = rand(0, 100);
        line("Question: $num");
        $answer = prompt('Your answer');
        if ($num % 2 === 0) {
            if ($answer === 'yes') {
                line('Correct!');
            } else {
                return line("{$answer} is wrong answer ;(. Correct answer was 'yes'.\nLet's try again, {$name}!");
            }
        }
        if ($num % 2 !== 0) {
            if ($answer === 'no') {
                line('Correct!');
            } else {
                return line("{$answer} is wrong answer ;(. Correct answer was 'no'.\nLet's try again, {$name}!");
            }
        }
    }
    line("Congratulations, %s!", $name);
}
