<?php

namespace Brain\Games\Games\Progression;

use function Brain\Games\Engine\playGameAndShowResult;

const MIN_NUM = 1;
const MAX_NUM = 100;
const MIN_STEP = -5;
const MAX_STEP = 5;

function startGameProgression()
{
    $description = 'What number is missing in the progression?';
    $gameFunction = function () {
        $firstElement = random_int(MIN_NUM, MAX_NUM);
        $stepOfProgression = random_int(MIN_STEP, MAX_STEP);
        [$value, $rightAnswer] = findTheMissingElement($firstElement, $stepOfProgression);
        return [$value, (string) $rightAnswer];
    };

    playGameAndShowResult($description, $gameFunction);
}

function findTheMissingElement(int $firstElement, int $stepOfProgression)
{
    $progressionArray = [$firstElement];
    for ($i = 1; $i < 10; $i++) {
        $progressionArray[$i] = $progressionArray[$i - 1] + $stepOfProgression;
    }
    $missingElemIndex = array_rand($progressionArray);
    $rightAnswer = $progressionArray[$missingElemIndex];
    $progressionArray[$missingElemIndex] = '..';
    $value = implode(' ', $progressionArray);
    return [$value, $rightAnswer];
}
