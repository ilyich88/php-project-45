<?php

namespace Brain\Games\Games\Progression;

use function Brain\Games\Engine\playGameAndShowResult;

use const Brain\Games\Engine\MIN_NUMBER;
use const Brain\Games\Engine\MAX_NUMBER;

const MIN_STEP = 1;
const MAX_STEP = 5;
const SIZE_OF_PROGRESSION = 10;

function startGameProgression()
{
    $description = 'What number is missing in the progression?';
    $gameFunction = function () {
        $firstElement = random_int(MIN_NUMBER, MAX_NUMBER);
        $stepOfProgression = random_int(MIN_STEP, MAX_STEP);
        $lastElement = $firstElement + SIZE_OF_PROGRESSION * $stepOfProgression - $stepOfProgression;
        $progressionArray = createProgression($firstElement, $lastElement, $stepOfProgression);
        $missingElemIndex = array_rand($progressionArray);
        $progressionArray[$missingElemIndex] = '..';
        $value = implode(' ', $progressionArray);
        $rightAnswer = findTheMissingElement($progressionArray, $stepOfProgression);
        return [$value, (string) $rightAnswer];
    };

    playGameAndShowResult($description, $gameFunction);
}

function createProgression(int $start, int $end, int $step): array
{
    $progression = range($start, $end, $step);
    return $progression;
}

function findTheMissingElement(array $numberList, int $step): int
{
    $missingElemIndex = array_search('..', $numberList, true);
    if ($missingElemIndex === 0) {
        $result = $numberList[$missingElemIndex + 1] - $step;
    } else {
        $result = $numberList[(int) $missingElemIndex - 1] + $step;
    }
    return $result;
}
