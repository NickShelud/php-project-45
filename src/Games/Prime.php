<?php

namespace BrainGames\Prime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\createRandArr;
use function BrainGames\Engine\congratulations;
use function BrainGames\Engine\printMessageWrongAnswer;

function checkPrime(int $digit)
{
    $counter = 0;
    for ($i = 1; $i <= $digit; $i++) {
        if ($digit % $i === 0) {
            $counter++;
            if ($counter > 2) {
                return 'no';
            }
        }
    }
    if ($counter === 2) {
        return 'yes';
    } else {
        return 'no';
    }
}

function prime(string $name)
{
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    $counter = 0;

    for ($i = 0; $i < 3; $i++) {
        $randDigit = rand(1, 100);
        $correctAnswer = checkPrime($randDigit);
        line("Question: {$randDigit}");
        $answer = prompt("Your answer");

        if ($answer === $correctAnswer) {
            line("Correct!");
            $counter++;
        } else {
            printMessageWrongAnswer($correctAnswer, $answer, $name);
            exit;
        }
    }
    congratulations($counter, $name);
}
