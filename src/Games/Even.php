<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\launchGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const TASK = 'Answer "yes" if the number is even, otherwise answer "no".';

function run()
{
    $questionsAndAnswers = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randNumber = rand(1, 100);
        $questionsAndAnswers["{$randNumber}"] = isEven($randNumber) ? 'yes' : 'no';
    }

    launchGame(TASK, $questionsAndAnswers);
}

function isEven(int $digit)
{
        return $digit % 2 === 0 ? true : false;
}
