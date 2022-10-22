<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\congratulations;
use function BrainGames\Engine\checkForParity;
use function BrainGames\Engine\printMessageWrongAnswer;
use function BrainGames\Engine\askQuestion;
use function BrainGames\Engine\getUserResponse;
use function BrainGames\Engine\checkAnswer;

use const BrainGames\Engine\COUNT_ITERATION;

const TASK = 'Answer "yes" if the number is even, otherwise answer "no".';

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
    $randArr = createRandArr();
    $correctAnswerArr = checkForParity($randArr);

    for ($i = 0; $i < COUNT_ITERATION; $i++) {
        $counter = $i;
        $task = TASK;
        $taskForGame = "{$randArr[$i]}";
        $answer = askQuestion($taskForGame, $task, $counter);

        checkAnswer($answer, $correctAnswerArr[$i], $name, $counter);
    }
}
