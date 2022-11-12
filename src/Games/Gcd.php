<?php

namespace BrainGames\Gcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\gameLounch;

use const BrainGames\Engine\ROUNDS_COUNT;

const TASK = 'Find the greatest common divisor of given numbers.';

function run()
{
    gameLounch(TASK, getGcd());
}

function getGcd()
{
    $firstDigitDivider = [];
    $secondDigitDivider = [];
    $questionsAndAnswers = [];

    for ($j = 0; $j < ROUNDS_COUNT; $j++) {
        $firstDigit = rand(1, 100);
        $secondDigit = rand(1, 100);

        $commonDivisor = [];
        $firstDigitDivider = [];
        $secondDigitDivider = [];
        $smallestDigit = $firstDigit > $secondDigit ? $secondDigit : $firstDigit;

        for ($i = 1; $i <= $smallestDigit; $i++) {
            //firstDigitDivider contains all the divisors of a number
            if ($firstDigit % $i === 0) {
                $firstDigitDivider[] = $i;
            }

            if ($secondDigit % $i === 0) {
                $secondDigitDivider[] = $i;
            }
        }

        $commonDivisor = array_intersect($firstDigitDivider, $secondDigitDivider);

        $questionsAndAnswers["{$firstDigit} {$secondDigit}"] = max($commonDivisor);
    }

    return $questionsAndAnswers;
}
