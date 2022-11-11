<?php

namespace BrainGames\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\gameLounch;

use const BrainGames\Engine\ROUNDS_COUNT;

const TASK = 'What number is missing in the progression?';

function run()
{
    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $differenceProgression = rand(1, 15);
        $startDigit = rand(0, 20);

        $countDigitInArr = rand(5, 10);
        $progressionArr = [$startDigit];

        for ($j = 1; $j <= $countDigitInArr; $j++) {
            $progressionArr[] = $progressionArr[$j - 1] + $differenceProgression;
        }
        $gameData['arr'][] = $progressionArr;
    }

    gameLounch(TASK, checkProgression($gameData));
}

function checkProgression($dataForGame)
{
        $arrWithStartArr = $dataForGame['arr'];
        $hiddenDigit = [];
        $gameTask = [];
        $questionsAndAnswers = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $startArr = $arrWithStartArr[$i];

        //rand Index
        $iRandIndex = rand(1, count($startArr) - 1);
        $hiddenDigit = $startArr[$iRandIndex];
        $startArr[$iRandIndex] = '..';
        $gameTask = implode(' ', $startArr);

        $questionsAndAnswers[$gameTask] = $hiddenDigit;
    }

    return $questionsAndAnswers;
}
