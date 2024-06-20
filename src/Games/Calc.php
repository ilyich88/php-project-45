<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\playGameAndShowResult;

function calculateExpression()
{
    $description = 'What is the result of the expression?';
    $gameFunction = function () {
        $min = 0;
        $max = 9;
        $firstNum = random_int($min, $max);
        $secondNum = random_int($min, $max);
        $operationsList = ['+', '-', '*'];
        $randIndex = random_int(0, count($operationsList) - 1);
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
        return [$value, (string) $rightAnswer];
    };

    playGameAndShowResult($description, $gameFunction);
}
