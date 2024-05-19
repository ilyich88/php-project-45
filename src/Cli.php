<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function showGreeting()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have tour name?');
    line("Hello, %s!", $name);
}
