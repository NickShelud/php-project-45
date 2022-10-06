<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function createRandArr()
{
    for ($i = 0; $i < 3; $i++) {
        $arr[] = rand(1, 100);
    };
    return $arr;
}
//$randArr = createRandArr();

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
//$correctAnswerArr = checkForParity($randArr);

function checkAnswers($name)
{
    $randArr = createRandArr();
    $correctAnswerArr = checkForParity($randArr);
    $counter = 0;
    for ($i = 0; $i < 3; $i++) {
        line("{$randArr[$i]}");
        $answer = prompt('Your answer');
        if ($answer === $correctAnswerArr[$i]) {
            line('Correct');
            $counter++;
        } elseif ($answer === 'no' and $correctAnswerArr[$i] === 'yes') {
            line("'no' is wrong answer ;(. Correct answer was 'yes'.");
            exit;
        } else {
            line("'yes' is wrong answer ;(. Correct answer was 'no'.");
            exit;
        }
    
    }
    if ($counter === 3) {
        line("Congratulations %s!", $name);
    }
}
