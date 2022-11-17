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
        $firstNumber = rand(1, 100);
        $secondNumber = rand(1, 100);

        $task = "{$firstNumber} {$secondNumber}";

        $gameData[$task] = getGcd($firstNumber, $secondNumber);
    }

    launchGame(TASK, $gameData);
}

function getGcd(int $firstNumber, int $secondNumber)
{
    $commonDivisor = [];
    $smallestNumber = $firstNumber > $secondNumber ? $secondNumber : $firstNumber;
    for ($i = 1; $i <= $smallestNumber; $i++) {
        if ($firstNumber % $i === 0 and $secondNumber % $i === 0) {
            $commonDivisor[] = $i;
        }
    }
    $answer = max($commonDivisor);

    return $answer;
}
