<?php

namespace BrainGames\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\launchGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const TASK = 'What is the result of the expression?';

function run()
{
    $gameData = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $argumentOne = rand(1, 100);
        $argumentTwo = rand(1, 100);

        $operation = ['+', '-', '*'];
        $operatorForTask = $operation[array_rand($operation)];

        $task = "{$argumentOne} {$operatorForTask} {$argumentTwo}";

        $gameData[$task] = getCalculate($argumentOne, $argumentTwo, $operatorForTask);
    }
    launchGame(TASK, $gameData);
}

function getCalculate(int $argumentOne, int $argumentTwo, string $operatorForTask)
{
    switch ($operatorForTask) {
        case '+':
            return $argumentOne + $argumentTwo;
        case '-':
            return $argumentOne - $argumentTwo;
        case '*':
            return $argumentOne * $argumentTwo;
    }
}
