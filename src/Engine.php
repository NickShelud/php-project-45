<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

//number of game iterations
const COUNT_ITERATION = 3;

//question for user
function askQuestion(string $taskForGame, string $task, int $counter)
{
    if ($counter === 0) {
        line($task);
    }

    line("Question: {$taskForGame}");
    return prompt("Your answer");
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

function checkAnswer(string $playerAnswer, string $correctAnswer, string $name, int $counter)
{
    if ($playerAnswer === $correctAnswer) {
        line("Correct!");
        if ($counter === 2) {
            line("Congratulations, %s!", $name);
        }
    } else {
        line("'{$playerAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
        line("Let's try again, {$name}!");
        exit;
    }
}
