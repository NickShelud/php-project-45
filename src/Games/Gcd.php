<?php

namespace BrainGames\Gcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\askQuestion;
use function BrainGames\Engine\getUserResponse;
use function BrainGames\Engine\checkAnswer;

use const BrainGames\Engine\COUNT_ITERATION;

const TASK = 'Find the greatest common divisor of given numbers.';

//create random array
function createRandArr()
{
    $arr = array();
    for ($i = 0; $i < 3; $i++) {
        $arr[] = rand(1, 100);
    };
    return $arr;
}

function findGcd(int $firstDigit, int $secondDigit)
{
    $firstDigitDivider = array();
    $secondDigitDivider = array();
    for ($i = 1; $i <= $firstDigit; $i++) {
        //firstDigitDivider contains all the divisors of a number
        if ($firstDigit % $i === 0) {
            $firstDigitDivider[] = $i;
        }
    }

    for ($i = 1; $i <= $secondDigit; $i++) {
        //secondDigitDivider contains all the divisors of a number
        if ($secondDigit % $i === 0) {
            $secondDigitDivider[] = $i;
        }
    }

    $commonDivisor = array_intersect($firstDigitDivider, $secondDigitDivider);

    return max($commonDivisor);
}

function checkGcd(string $name)
{

    $arrayOne = createRandArr();
    $arrayTwo = createRandArr();
    $counter = 0;

    for ($i = 0; $i < COUNT_ITERATION; $i++) {
        $counter = $i;
        $task = TASK;
        $taskForGame = "{$arrayOne[$i]} {$arrayTwo[$i]}";
        $answer = askQuestion($taskForGame, $task, $counter);

        $correctAnswer = findGcd($arrayOne[$i], $arrayTwo[$i]);

        checkAnswer($answer, $correctAnswer, $name, $counter);
    }
}
