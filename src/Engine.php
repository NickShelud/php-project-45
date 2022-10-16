<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

//number of game iterations
const COUNT_ITERATION = 3;

//question for user
function askQuestion(string $taskForGame)
{
    line("Question: {$taskForGame}");
}

function getUserResponse()
{
    return prompt("Your answer");
}

//checking responses in an array
function checkForParity(array $randArr)
{
    $correctAnswerArr = array();
    foreach ($randArr as $item) {
        if ((int) $item % 2 == 0) {
            $correctAnswerArr[] = 'yes';
        } else {
            $correctAnswerArr[] = 'no';
        }
    }
    return $correctAnswerArr;
}

//if answer was wrong, print this message
function printMessageWrongAnswer(string $correctAnswer, string $playerAnswer, string $name)
{
    line("'{$playerAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
    line("Let's try again, {$name}!");
}

//print in case of victory
function congratulations(string $name)
{
        line("Congratulations, %s!", $name);
}

function checkAnswer(string $answer, string $resultExpression, string $name)
{
    if ($answer === $resultExpression) {
        line("Correct!");
    } else {
        $resultExpression = (string) $resultExpression;
        printMessageWrongAnswer($resultExpression, $answer, $name);
        exit;
    }
}
