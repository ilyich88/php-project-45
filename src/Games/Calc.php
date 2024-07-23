<?php

namespace Brain\Games\Games\Calc;

use function Brain\Games\Engine\playGameAndShowResult;

use const Brain\Games\Engine\MIN_NUMBER;
use const Brain\Games\Engine\MAX_NUMBER;

function startGameCalc()
{
    $description = 'What is the result of the expression?';
    $gameFunction = function () {
        $firstNum = random_int(MIN_NUMBER, MAX_NUMBER);
        $secondNum = random_int(MIN_NUMBER, MAX_NUMBER);
        $operationsList = ['+', '-', '*'];
        $randIndex = array_rand($operationsList);
        $operator = $operationsList[$randIndex];
        $value = "{$firstNum} {$operator} {$secondNum}";
        $rightAnswer = calculateExpression($firstNum, $operator, $secondNum);
        return [$value, (string) $rightAnswer];
    };

    playGameAndShowResult($description, $gameFunction);
}

function calculateExpression(int $operand1, string $operator, int $operand2): int
{
    switch ($operator) {
        case '+':
            return $operand1 + $operand2;
        case '-':
            return $operand1 - $operand2;
        case '*':
            return $operand1 * $operand2;
        default:
            return 0;
    }
}
