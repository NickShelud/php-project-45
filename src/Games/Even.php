<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\run;

use const BrainGames\Engine\ROUNDS_COUNT;

const TASK = 'Answer "yes" if the number is even, otherwise answer "no".';

function preparationData()
{
    $accamulator = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randDigit = rand(1, 100);
        $accamulator['digit'][] = $randDigit;
        $accamulator['task'][] = "{$randDigit}";
    }
    return $accamulator;
}

function checkAnswers()
{
    $dataForGame = preparationData();
    $correctAnswer = [];
    $gameTask = $dataForGame['task'];
    $randDigit = $dataForGame['digit'];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        if ((int) $randDigit[$i] % 2 === 0) {
            $correctAnswer[] = 'yes';
        } else {
            $correctAnswer[] = 'no';
        }
    }

    run($gameTask, TASK, $correctAnswer);
}
