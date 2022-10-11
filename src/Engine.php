<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

//welcomes the player and asks for their name
function gettingName()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}
//create random array
function createRandArr()
{
    $arr = array();
    for ($i = 0; $i < 3; $i++) {
        $arr[] = rand(1, 100);
    };
    return $arr;
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
function congratulations(int $counter, string $name)
{
    if ($counter === 3) {
        line("Congratulations, %s!", $name);
    }
}
