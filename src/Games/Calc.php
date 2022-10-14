<?php

namespace BrainGames\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\congratulations;
use function BrainGames\Engine\printMessageWrongAnswer;
use function BrainGames\Engine\askQuestion;
use function BrainGames\Engine\getUserResponse;
use function BrainGames\Engine\checkAnswer;
use const BrainGames\Engine\COUNT_ITERATION;

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

function calc(string $name)
{
    define('TASK', 'What is the result of the expression?');
    line(TASK);
    

    $arrayOne = createRandArr();
    $arrayTwo = createRandArr();
    $counter = 0;
    $arrayWithOperator = choiceOperator();
    $resultExpression = 0;

    for ($i = 0; $i < COUNT_ITERATION; $i++) {
        $taskForGame = "{$arrayOne[$i]} {$arrayWithOperator[$i]} {$arrayTwo[$i]}";
        askQuestion($taskForGame);
        $answer = getUserResponse();

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
    }

checkAnswer($answer, $resultExpression, $counter, $name);
