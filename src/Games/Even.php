<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\run;

use const BrainGames\Engine\COUNT_ITERATION;

const TASK = 'Answer "yes" if the number is even, otherwise answer "no".';

function checkAnswers(string $name)
{
    $task = TASK;
    $correctAnswerArr = [];
    $gameTask = [];

    for ($i = 0; $i < COUNT_ITERATION; $i++) {
        $randDigit = rand(1, 100);

        $correctAnswers = function ($randDigit) {
            if ((int) $randDigit % 2 == 0) {
                $correctAnswer = 'yes';
            } else {
                $correctAnswer = 'no';
            }
            return $correctAnswer;
        };

        $correctAnswerArr[] = $correctAnswers($randDigit);
        $gameTask[] = "{$randDigit}";
    }

    run($gameTask, $task, $correctAnswerArr, $name);
}
