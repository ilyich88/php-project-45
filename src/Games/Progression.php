<?php

namespace Brain\Games\Games\Progression;

use function Brain\Games\Engine\playGameAndShowResult;
use function Brain\Games\Engine\showGreetingAndGetName;

use const Brain\Games\Engine\MIN_NUMBER;
use const Brain\Games\Engine\MAX_NUMBER;

const MIN_STEP = -5;
const MAX_STEP = 5;

function startGameProgression()
{
    $description = 'What number is missing in the progression?';
    $name = showGreetingAndGetName($description);
    $gameFunction = function () {
        $firstElement = random_int(MIN_NUMBER, MAX_NUMBER);
        $stepOfProgression = random_int(MIN_STEP, MAX_STEP);
        $progressionArray = [$firstElement];
        for ($i = 1; $i < 10; $i++) {
            $progressionArray[$i] = $progressionArray[$i - 1] + $stepOfProgression;
        }
        $missingElemIndex = array_rand($progressionArray);
        $progressionArray[$missingElemIndex] = '..';
        $value = implode(' ', $progressionArray);
        $rightAnswer = findTheMissingElement($progressionArray, $stepOfProgression);
        return [$value, (string) $rightAnswer];
    };

    playGameAndShowResult($name, $gameFunction);
}

function findTheMissingElement(array $numberList, int $step)
{
    $missingElemIndex = array_search('..', $numberList, true);
    if ($missingElemIndex === 0) {
        $result = $numberList[$missingElemIndex + 1] - $step;
    } else {
        $result = $numberList[(int) $missingElemIndex - 1] + $step;
    }
    return $result;
}
