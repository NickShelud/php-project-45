<?php

namespace BrainGames\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\createRandArr;
use function BrainGames\Engine\congratulations;
use function BrainGames\Engine\printMessageWrongAnswer;

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

function calc($name)
{
    line("What is the result of the expression?");

    $arrayOne = createRandArr();
    $arrayTwo = createRandArr();
    $counter = 0;
    $arrayWithOperator = choiceOperator();

    for ($i = 0; $i < 3; $i++) {
        line("Question: {$arrayOne[$i]} {$arrayWithOperator[$i]} {$arrayTwo[$i]}");
        $answer = prompt("Your answer");

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

        if ((int) $answer === $resultExpression) {
            line("Correct!");
            $counter++;
        } else {
            printMessageWrongAnswer($resultExpression, $answer, $name);
            exit;
        }
    }
    congratulations($counter, $name);
}
