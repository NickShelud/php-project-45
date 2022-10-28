<?php

namespace BrainGames\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\run;

use const BrainGames\Engine\COUNT_ITERATION;

const TASK = 'What is the result of the expression?';

function calculate(string $name)
{

    $resultExpression = [];

    for ($i = 0; $i < COUNT_ITERATION; $i++) {
        $argumentOne = rand(1, 100);
        $argumentTwo = rand(1, 100);

        $operator = function () {
            $operators = ['+', '-', '*'];
            $randDigit = rand(0, 2);
            $arrayWithOperator = $operators[$randDigit];

            return $arrayWithOperator;
        };

        $operatorForTask = $operator();
        $counter = $i;
        $task = TASK;
        $gameTask[] = "{$argumentOne} {$operatorForTask} {$argumentTwo}";

        switch ($operatorForTask) {
            case '+':
                $resultExpression[] = $argumentOne + $argumentTwo;
                break;
            case '-':
                $resultExpression[] = $argumentOne - $argumentTwo;
                break;
            case '*':
                $resultExpression[] = $argumentOne * $argumentTwo;
                break;
        }
    }
    run($gameTask, $task, $resultExpression, $name, $counter);
}
