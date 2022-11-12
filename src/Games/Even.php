<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\gameLounch;

use const BrainGames\Engine\ROUNDS_COUNT;

const TASK = 'Answer "yes" if the number is even, otherwise answer "no".';

function run()
{
    gameLounch(TASK, isEven());
}

function isEven()
{
    $correctAnswer = [];
    $questionsAndAnswers = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randDigit = rand(1, 100);

        if ($randDigit % 2 === 0) {
            $questionsAndAnswers["{$randDigit}"] = 'yes';
        } else {
            $questionsAndAnswers["{$randDigit}"] = 'no';
        }
    }

    return $questionsAndAnswers;
}
