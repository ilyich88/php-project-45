<?php

namespace Brain\Games\Games\Calc;

use function Brain\Games\Engine\playGameAndShowResult;

const MIN = 0;
const MAX = 99;

function startGameCalc()
{
    $description = 'What is the result of the expression?';
    $gameFunction = function () {
        $firstNum = random_int(MIN, MAX);
        $secondNum = random_int(MIN, MAX);
        [$value, $rightAnswer] = calculateExpression($firstNum, $secondNum);
        return [$value, (string) $rightAnswer];
    };

    playGameAndShowResult($description, $gameFunction);
}

function calculateExpression(int $firstNum, int $secondNum)
{
    $operationsList = ['+', '-', '*'];
    $randIndex = array_rand($operationsList);
    $operation = $operationsList[$randIndex];
    $value = "{$firstNum} {$operation} {$secondNum}";
    switch ($operation) {
        case '+':
            $rightAnswer = $firstNum + $secondNum;
            break;
        case '-':
            $rightAnswer = $firstNum - $secondNum;
            break;
        case '*':
            $rightAnswer = $firstNum * $secondNum;
            break;
    }
    return [$value, $rightAnswer];
}
