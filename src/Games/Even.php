<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\createRandArr;
use function BrainGames\Engine\congratulations;
use function BrainGames\Engine\checkForParity;

function checkAnswers($name)
{
    $randArr = createRandArr();
    $correctAnswerArr = checkForParity($randArr);
    $counter = 0;
    for ($i = 0; $i < 3; $i++) {
        line("Question: {$randArr[$i]}");
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
    congratulations($counter, $name);
}
