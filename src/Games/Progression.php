<?php

namespace BrainGames\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\run;

use const BrainGames\Engine\ROUNDS_COUNT;

const TASK = 'What number is missing in the progression?';

function preparationData()
{
    $accamulate = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $differenceProgression = rand(1, 15);
        $startDigit = rand(0, 20);

        $countDigitInArr = rand(5, 10);
        $progressionArr = [$startDigit];

        for ($j = 1; $j <= $countDigitInArr; $j++) {
            $progressionArr[] = $progressionArr[$j - 1] + $differenceProgression;
        }
        $accamulate['arr'][] = $progressionArr;
    }
    return $accamulate;
}

function checkProgression()
{
        $dataForGame = preparationData();
        $arrWithStartArr = $dataForGame['arr'];
        $hiddenDigit = [];
        $gameTask = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $startArr = $arrWithStartArr[$i];

        //rand Index
        $j = rand(1, count($startArr) - 1);
        $hiddenDigit[] = $startArr[$j];
        $startArr[$j] = '..';
        $gameTask[] = implode(' ', $startArr);
    }
    run($gameTask, TASK, $hiddenDigit);
}
