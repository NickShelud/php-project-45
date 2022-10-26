<?php

namespace BrainGames\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\run;

use const BrainGames\Engine\COUNT_ITERATION;

const TASK = 'What is the result of the expression?';

//create random array
function createRandArr()
{
    $arr = array();
    for ($i = 0; $i < 3; $i++) {
        $arr[] = rand(1, 100);
    };
    return $arr;
}

function choiceOperator()
{
    $operators = ['+', '-', '*'];
    $arrayWithOperator = [];
    for ($i = 0; $i < 3; $i++) {
        $randDigit = rand(0, 2);
        $arrayWithOperator[] = $operators[$randDigit];
    }
    return $arrayWithOperator;
}

function calculate(string $name)
{

    $arrayOne = createRandArr();
    $arrayTwo = createRandArr();
    $arrayWithOperator = choiceOperator();
    $resultExpression = 0;

    for ($i = 0; $i < COUNT_ITERATION; $i++) {
        $counter = $i;
        $task = TASK;
        $taskForGame = "{$arrayOne[$i]} {$arrayWithOperator[$i]} {$arrayTwo[$i]}";

        switch ($arrayWithOperator[$i]) {
            case '+':
                $resultExpression = $arrayOne[$i] + $arrayTwo[$i];
                break;
            case '-':
                $resultExpression = $arrayOne[$i] - $arrayTwo[$i];
                break;
            case '*':
                $resultExpression = $arrayOne[$i] * $arrayTwo[$i];
                break;
        }
        run($taskForGame, $task, string $resultExpression, $name, $counter);
    }
}
