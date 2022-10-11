<?php

namespace BrainGames\Gcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\createRandArr;
use function BrainGames\Engine\congratulations;
use function BrainGames\Engine\printMessageWrongAnswer;

function findGcd(int $firstDigit, int $secondDigit)
{
    $firstDigitDivider = array();
    $secondDigitDivider = array();
    for ($i = 1; $i <= (int) $firstDigit; $i++) {
        //firstDigitDivider contains all the divisors of a number
        if ($firstDigit % $i === 0) {
            $firstDigitDivider[] = $i;
        }
    }

    for ($i = 1; $i <= (int) $secondDigit; $i++) {
        //secondDigitDivider contains all the divisors of a number
        if ($secondDigit % $i === 0) {
            $secondDigitDivider[] = $i;
        }
    }

    $commonDivisor = array_intersect($firstDigitDivider, $secondDigitDivider);

    return max($commonDivisor);
}

function gcd(string $name)
{
    line("Find the greatest common divisor of given numbers.");

    $arrayOne = createRandArr();
    $arrayTwo = createRandArr();
    $counter = 0;

    for ($i = 0; $i < 3; $i++) {
        line("Question: {$arrayOne[$i]} {$arrayTwo[$i]}");
        $answer = prompt("Your answer");

        $correctAnswer = findGcd($arrayOne[$i], $arrayTwo[$i]);

        if ((int) $answer === $correctAnswer) {
            line("Correct!");
            $counter++;
        } else {
            printMessageWrongAnswer($correctAnswer, $answer, $name);
            exit;
        }
    }
    congratulations($counter, $name);
}
