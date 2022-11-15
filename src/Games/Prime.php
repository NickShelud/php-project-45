<?php

namespace BrainGames\Prime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\launchGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const TASK = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function run()
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randDigit = rand(1, 100);
        $questionsAndAnswers[$randDigit] = checkPrime($randDigit) === true ? 'yes' : 'no';
    }
    launchGame(TASK, $questionsAndAnswers);
}

function checkPrime(int $digit)
{
    for ($i = 2; $i < $digit; $i++) {
        if ($digit % $i === 0) {
            return false;
        }
    }
    return true;
}
