<?php

namespace BrainGames\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\run;

use const BrainGames\Engine\ROUNDS_COUNT;

const TASK = 'What is the result of the expression?';

function preparationData()
{
    $gameTask = [];
    $accamulator = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $argumentOne = rand(1, 100);
        $accamulator['firstArr'][] = $argumentOne;

        $argumentTwo = rand(1, 100);
        $accamulator['secondArr'][] = $argumentTwo;

        $operator = function () {
            $operators = ['+', '-', '*'];

            //rand Digit
            $i = rand(0, 2);
            $arrayWithOperator = $operators[$i];

            return $arrayWithOperator;
        };

        $operatorForTask = $operator();
        $accamulator['operator'][] = $operatorForTask;

        $accamulator['task'][] = "{$argumentOne} {$operatorForTask} {$argumentTwo}";
    }
    return $accamulator;
}

function calculate()
{
    $dataForGame = preparationData();

    $argumentOne = $dataForGame['firstArr'];
    $argumentTwo = $dataForGame['secondArr'];
    $operatorForTask = $dataForGame['operator'];
    $gameTask = $dataForGame['task'];
    $resultExpression = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        switch ($operatorForTask[$i]) {
            case '+':
                $resultExpression[] = $argumentOne[$i] + $argumentTwo[$i];
                break;
            case '-':
                $resultExpression[] = $argumentOne[$i] - $argumentTwo[$i];
                break;
            case '*':
                $resultExpression[] = $argumentOne[$i] * $argumentTwo[$i];
                break;
        }
    }
    run($gameTask, TASK, $resultExpression);
}
