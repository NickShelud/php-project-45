<?php

namespace BrainGames\Prime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\congratulations;
use function BrainGames\Engine\printMessageWrongAnswer;
use function BrainGames\Engine\askQuestion;
use function BrainGames\Engine\getUserResponse;
use function BrainGames\Engine\checkAnswer;

use const BrainGames\Engine\COUNT_ITERATION;

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
    define('TASK', 'Answer "yes" if given number is prime. Otherwise answer "no".');
    line(TASK);

    for ($i = 0; $i < COUNT_ITERATION; $i++) {
        $randDigit = rand(1, 100);
        $correctAnswer = checkPrime($randDigit);

        $taskForGame = "{$randDigit}";
        askQuestion($taskForGame);
        $answer = getUserResponse();

        checkAnswer($answer, $correctAnswer, $name);
    }
    congratulations($name);
}
