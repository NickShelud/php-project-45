<?php

namespace BrainGames\Gcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\gameLounch;

use const BrainGames\Engine\ROUNDS_COUNT;

const TASK = 'Find the greatest common divisor of given numbers.';

function run()
{
    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $firstDigit = rand(1, 100);
        $gameData['firstDigit'][] = $firstDigit;

        $secondDigit = rand(1, 100);
        $gameData['secondDigit'][] = $secondDigit;

        $gameData['task'][] = "{$firstDigit} {$secondDigit}";
    }

    gameLounch(TASK, checkGcd($gameData));
}

function checkGcd(array $dataForGame)
{
    $firstDigit = $dataForGame['firstDigit'];
    $secondDigit = $dataForGame['secondDigit'];
    $gameTask = $dataForGame['task'];
    $firstDigitDivider = [];
    $secondDigitDivider = [];
    $questionsAndAnswers = [];

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

        $questionsAndAnswers[$gameTask[$j]] = max($commonDivisor);
    }

    return $questionsAndAnswers;
}
