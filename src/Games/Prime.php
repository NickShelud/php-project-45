<?php

namespace BrainGames\Prime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\run;

use const BrainGames\Engine\ROUNDS_COUNT;

const TASK = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function preparationData()
{
    $accamulate = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randDigit = rand(1, 100);
        $accamulate['digit'][] = $randDigit;
        $accamulate['task'][] = "{$randDigit}";
    }
    return $accamulate;
}

function checkPrime()
{
    $dataForGame = preparationData();
    $correctAnswer = [];
    $gameTask = $dataForGame['task'];
    $randDigit = $dataForGame['digit'];
    $questionsAndAnswers = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $counter = 0;

        for ($j = 1; $j <= $randDigit[$i]; $j++) {
            if ($randDigit[$i] % $j === 0) {
                $counter += 1;
            }
        }

        if ($counter === 2) {
            $questionsAndAnswers[$gameTask[$i]] = 'yes';
        } else {
            $questionsAndAnswers[$gameTask[$i]] = 'no';
        }
    }

    run(TASK, $questionsAndAnswers);
}
