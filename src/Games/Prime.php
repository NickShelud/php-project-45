<?php

namespace BrainGames\Prime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\askQuestion;
use function BrainGames\Engine\getUserResponse;
use function BrainGames\Engine\checkAnswer;

use const BrainGames\Engine\COUNT_ITERATION;

const TASK = 'Answer "yes" if given number is prime. Otherwise answer "no".';

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

function getPrime(string $name)
{

    for ($i = 0; $i < COUNT_ITERATION; $i++) {
        $counter = $i;
        $task = TASK;
        $randDigit = rand(1, 100);
        $correctAnswer = checkPrime($randDigit);

        $taskForGame = "{$randDigit}";
        $answer = askQuestion($taskForGame, $task, $counter);

        checkAnswer($answer, $correctAnswer, $name, $counter);
    }
}
