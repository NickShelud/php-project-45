<?php

namespace BrainGames\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\gameLounch;

use const BrainGames\Engine\ROUNDS_COUNT;

const TASK = 'What number is missing in the progression?';

function run()
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $differenceProgression = rand(1, 15);
        $startDigit = rand(0, 20);

        $countDigitInArr = rand(5, 10);
        $progressionArr = [$startDigit];

        for ($j = 1; $j <= $countDigitInArr; $j++) {
            $progressionArr[] = $progressionArr[$j - 1] + $differenceProgression;
        }
        $questionsAndAnswers = array_merge($questionsAndAnswers, getProgression($progressionArr));
    }
    gameLounch(TASK, $questionsAndAnswers);
}

function getProgression(array $startArray)
{
    $iRandIndex = rand(1, count($startArray) - 1);
    $hiddenDigit = $startArray[$iRandIndex];
    $startArray[$iRandIndex] = '..';
    $gameTask = implode(' ', $startArray);

    return ["{$gameTask}" => $hiddenDigit];
}
