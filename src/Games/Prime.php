<?php

namespace BrainGames\Prime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\gameLounch;

use const BrainGames\Engine\ROUNDS_COUNT;

const TASK = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function run()
{
    gameLounch(TASK, isPrime());
}

function isPrime()
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $counter = 0;
        $randDigit = rand(1, 100);

        for ($j = 1; $j <= $randDigit; $j++) {
            if ($randDigit % $j === 0) {
                $counter += 1;
            }
        }

        if ($counter === 2) {
            $questionsAndAnswers["{$randDigit}"] = 'yes';
        } else {
            $questionsAndAnswers["{$randDigit}"] = 'no';
        }
    }

    return $questionsAndAnswers;
}
