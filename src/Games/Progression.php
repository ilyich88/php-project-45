<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\playGameAndShowResult;

function findTheMissingElement()
{
    $description = 'What number is missing in the progression?';
    $gameFunction = function () {
        $firstElement = random_int(1, 100);
        $stepOfProgression = random_int(-5, 5);
        $progressionArray = [$firstElement];
        for ($i = 1; $i < 10; $i++) {
            $progressionArray[$i] = $progressionArray[$i - 1] + $stepOfProgression;
        }
        $missingElemIndex = random_int(0, 9);
        $rightAnswer = (string) $progressionArray[$missingElemIndex];
        $progressionArray[$missingElemIndex] = '..';
        $value = implode(' ', $progressionArray);
        return [$value, $rightAnswer];
    };

    playGameAndShowResult($description, $gameFunction);
}
