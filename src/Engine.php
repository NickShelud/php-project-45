<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

//welcomes the player and asks for their name
function gettingName()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}
//create random array
function createRandArr()
{
    for ($i = 0; $i < 3; $i++) {
        $arr[] = rand(1, 100);
    };
    return $arr;
}

//checking responses in an array
function checkForParity($randArr)
{
    foreach ($randArr as $item) {
        if ((int) $item % 2 == 0) {
            $correctAnswerArr[] = 'yes';
        } else {
            $correctAnswerArr[] = 'no';
        }
    }
    return $correctAnswerArr;
}

//print in case of victory
function congratulations($counter, $name)
{
    if ($counter === 3) {
        line("Congratulations %s!", $name);
    }
}