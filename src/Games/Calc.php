<?php

namespace BrainGames\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\gameLounch;

use const BrainGames\Engine\ROUNDS_COUNT;

const TASK = 'What is the result of the expression?';

function run()
{
    $operation = ['+', '-', '*'];
    gameLounch(TASK, calculate($operation));
}

function calculate(array $operation)
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $operatorForTask = $operation[array_rand($operation, 1)];

        $argumentOne = rand(1, 100);
        $argumentTwo = rand(1, 100);

        $gameTask = "{$argumentOne} {$operatorForTask} {$argumentTwo}";

        switch ($operatorForTask) {
            case '+':
                $questionsAndAnswers[$gameTask] = $argumentOne + $argumentTwo;
                break;
            case '-':
                $questionsAndAnswers[$gameTask] = $argumentOne - $argumentTwo;
                break;
            case '*':
                $questionsAndAnswers[$gameTask] = $argumentOne * $argumentTwo;
                break;
        }
    }

    return $questionsAndAnswers;
}
