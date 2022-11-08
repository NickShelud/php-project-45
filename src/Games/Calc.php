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

        $operatorForTask = array_rand(['+' => '+', '-' => '-', '*' => '*'], 1);

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
    $questionsAndAnswers = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        switch ($operatorForTask[$i]) {
            case '+':
                $questionsAndAnswers[$gameTask[$i]] = $argumentOne[$i] + $argumentTwo[$i];
                break;
            case '-':
                $questionsAndAnswers[$gameTask[$i]] = $argumentOne[$i] - $argumentTwo[$i];
                break;
            case '*':
                $questionsAndAnswers[$gameTask[$i]] = $argumentOne[$i] * $argumentTwo[$i];
                break;
        }
    }

    run(TASK, $questionsAndAnswers);
}
