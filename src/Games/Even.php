<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\congratulations;
use function BrainGames\Engine\checkForParity;
use function BrainGames\Engine\printMessageWrongAnswer;
use function BrainGames\Engine\askQuestion;
use function BrainGames\Engine\getUserResponse;
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

function checkAnswers(string $name)
{
    define('TASK', 'Answer "yes" if the number is even, otherwise answer "no".');
    line(TASK);
    $randArr = createRandArr();
    $correctAnswerArr = checkForParity($randArr);
    $counter = 0;

    for ($i = 0; $i < COUNT_ITERATION; $i++) {
        $taskForGame = "{$randArr[$i]}";
        askQuestion($taskForGame);
        $answer = getUserResponse();

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
