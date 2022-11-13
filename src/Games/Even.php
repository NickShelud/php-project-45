<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\gameLounch;

use const BrainGames\Engine\ROUNDS_COUNT;

const TASK = 'Answer "yes" if the number is even, otherwise answer "no".';

function run()
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randDigit = rand(1, 100);
        $questionsAndAnswers["{$randDigit}"] = true === isEven($randDigit) ? 'yes' : 'no';
    }

    gameLounch(TASK, $questionsAndAnswers);
}

function isEven(int $digit)
{
        return $digit % 2 === 0 ? true : false;
}
