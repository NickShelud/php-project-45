<?php

namespace BrainGames\Gcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\launchGame;

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

    launchGame(TASK, getGcd($gameData));
}

function getGcd(array $dataForGame)
{
    $firstDigit = $dataForGame['firstDigit'];
    $secondDigit = $dataForGame['secondDigit'];
    $gameTask = $dataForGame['task'];
    $correctAnswer = [];
    $firstDigitDivider = [];
    $secondDigitDivider = [];
    $questionsAndAnswers = [];

    for ($j = 0; $j < ROUNDS_COUNT; $j++) {
        $commonDivisor = [];

        $smallestDigit = $firstDigit[$j] > $secondDigit[$j] ? $secondDigit[$j] : $firstDigit[$j];
        for ($i = 1; $i <= $smallestDigit; $i++) {
            if ($firstDigit[$j] % $i === 0 and $secondDigit[$j] % $i === 0) {
                $commonDivisor[] = $i;
            }
        }

        $questionsAndAnswers[$gameTask[$j]] = max($commonDivisor);
    }

    return $questionsAndAnswers;
}
