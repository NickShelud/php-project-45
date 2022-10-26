<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\run;

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

function checkAnswers(string $name)
{
    $randArr = createRandArr();
    $correctAnswerArr = checkForParity($randArr);

    for ($i = 0; $i < COUNT_ITERATION; $i++) {
        $counter = $i;
        $task = TASK;
        $taskForGame = "{$randArr[$i]}";

        run($taskForGame, $task, $correctAnswerArr[$i], $name, $counter);
    }
}
