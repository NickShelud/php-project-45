<?php

namespace BrainGames\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\gameLounch;

use const BrainGames\Engine\ROUNDS_COUNT;

const TASK = 'What number is missing in the progression?';

function run()
{
    gameLounch(TASK, getProgression());
}

function getProgression()
{
    $hiddenDigit = [];
    $gameTask = [];
    $questionsAndAnswers = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $differenceProgression = rand(1, 15);
        $startDigit = rand(0, 20);

        $countDigitInArr = rand(5, 10);
        $progressionArr = [$startDigit];

        for ($j = 1; $j <= $countDigitInArr; $j++) {
            $progressionArr[] = $progressionArr[$j - 1] + $differenceProgression;
        }

        $iRandIndex = rand(1, count($progressionArr) - 1);
        $hiddenDigit = $progressionArr[$iRandIndex];
        $progressionArr[$iRandIndex] = '..';
        $gameTask = implode(' ', $progressionArr);

        $questionsAndAnswers[$gameTask] = $hiddenDigit;
    }

    return $questionsAndAnswers;
}
