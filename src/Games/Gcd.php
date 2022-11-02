<?php

namespace BrainGames\Gcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\run;

use const BrainGames\Engine\ROUNDS_COUNT;

const TASK = 'Find the greatest common divisor of given numbers.';

function preparationData()
{
    $accamulate = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $firstDigit = rand(1, 100);
        $accamulate['firstDigit'][] = $firstDigit;

        $secondDigit = rand(1, 100);
        $accamulate['secondDigit'][] = $secondDigit;

        $accamulate['task'][] = "{$firstDigit} {$secondDigit}";
    }

    return $accamulate;
}

function checkGcd()
{
    $dataForGame = preparationData();
    $firstDigit = $dataForGame['firstDigit'];
    $secondDigit = $dataForGame['secondDigit'];
    $gameTask = $dataForGame['task'];
    $correctAnswer = [];
    $firstDigitDivider = [];
    $secondDigitDivider = [];

    for ($j = 0; $j < ROUNDS_COUNT; $j++) {
        $commonDivisor = [];
        $firstDigitDivider = [];
        $secondDigitDivider = [];
        for ($i = 1; $i <= $firstDigit[$j]; $i++) {
            //firstDigitDivider contains all the divisors of a number
            if ($firstDigit[$j] % $i === 0) {
                $firstDigitDivider[] = $i;
            }
        }

        for ($i = 1; $i <= $secondDigit[$j]; $i++) {
            //secondDigitDivider contains all the divisors of a number
            if ($secondDigit[$j] % $i === 0) {
                $secondDigitDivider[] = $i;
            }
        }
        $commonDivisor = array_intersect($firstDigitDivider, $secondDigitDivider);
        $correctAnswer[] = max($commonDivisor);
    }
    run($gameTask, TASK, $correctAnswer);
}
