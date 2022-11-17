<?php

namespace BrainGames\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\launchGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const TASK = 'What number is missing in the progression?';

function run()
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $differenceProgression = rand(1, 15);
        $startNumber = rand(0, 20);

        $countDigitInProgression = rand(5, 10);
        $progression = createProgression($startNumber, $differenceProgression, $countDigitInProgression);

        $questionsAndAnswers = array_merge($questionsAndAnswers, getProgression($progression));
    }
    launchGame(TASK, $questionsAndAnswers);
}

function getProgression(array $startProgression)
{
    $iRandIndex = rand(1, count($startProgression) - 1);
    $hiddenDigit = $startProgression[$iRandIndex];
    $startProgression[$iRandIndex] = '..';
    $gameTask = implode(' ', $startProgression);

    return ["{$gameTask}" => $hiddenDigit];
}

function createProgression(int $startNumber, int $differenceProgression, int $countDigitInProgression)
{
    $progression = [$startNumber];

    for ($i = 1; $i <= $countDigitInProgression; $i++) {
        $progression[] = $progression[$i - 1] + $differenceProgression;
    }

    return $progression;
}
