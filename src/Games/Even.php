<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\createRandArr;
use function BrainGames\Engine\congratulations;
use function BrainGames\Engine\checkForParity;
use function BrainGames\Engine\printMessageWrongAnswer;

function checkAnswers(string $name)
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $randArr = createRandArr();
    $correctAnswerArr = checkForParity($randArr);
    $counter = 0;
    for ($i = 0; $i < 3; $i++) {
        line("Question: {$randArr[$i]}");
        $answer = prompt('Your answer');
        if ($answer === $correctAnswerArr[$i]) {
            line('Correct');
            $counter++;
        } else {
            printMessageWrongAnswer($correctAnswerArr[$i], $answer, $name);
            exit;
        }
    }
    congratulations($counter, $name);
}
