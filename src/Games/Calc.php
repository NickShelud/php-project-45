<?php

namespace BrainGames\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\gameLounch;

use const BrainGames\Engine\ROUNDS_COUNT;

const TASK = 'What is the result of the expression?';

function run()
{
    $gameTask = [];
    $gameData = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $argumentOne = rand(1, 100);
        $gameData['firstArr'][] = $argumentOne;

        $argumentTwo = rand(1, 100);
        $gameData['secondArr'][] = $argumentTwo;

        $operation = ['+', '-', '*'];
        $operatorForTask = $operation[array_rand($operation, 1)];

        $gameData['operator'][] = $operatorForTask;

        $gameData['task'][] = "{$argumentOne} {$operatorForTask} {$argumentTwo}";
    }

    gameLounch(TASK, calculate($gameData));
}

function calculate($dataForGame)
{
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

    return $questionsAndAnswers;
}
