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
        $randNumber = rand(1, 100);
        $questionsAndAnswers[$randNumber] = isPrime($randNumber) ? 'yes' : 'no';
    }
    launchGame(TASK, $questionsAndAnswers);
}

function isPrime(int $number)
{
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
