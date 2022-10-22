<?php

namespace BrainGames\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\askQuestion;
use function BrainGames\Engine\getUserResponse;
use function BrainGames\Engine\checkAnswer;

use const BrainGames\Engine\COUNT_ITERATION;

const TASK = 'What number is missing in the progression?';

function createRandProgression()
{
    //create difference for arithmetic progression
    $differenceProgression = rand(1, 15);

    //create first digit in arithmetic progression
    $startDigit = rand(0, 20);

    $countDigitInArr = rand(5, 10);
    $progressionArr = [$startDigit];

    for ($i = 1; $i <= $countDigitInArr; $i++) {
        $progressionArr[] = $progressionArr[$i - 1] + $differenceProgression;
    }

    return $progressionArr;
}

function choiceRandDigit(array $randArray)
{
    $count = count($randArray);
    $randIndex = rand(0, $count - 1);

    $hiddenDigit = $randArray[$randIndex];
    $randArray[$randIndex] = '..';

    return [$hiddenDigit, $randArray];
}

function checkProgression(string $name)
{

    for ($i = 0; $i < COUNT_ITERATION; $i++) {
        $counter = $i;
        $task = TASK;
        $arrRand = createRandProgression();
        $arr = choiceRandDigit($arrRand);
        $hiddenDigit = $arr[0];
        $arrayWhisProgression = implode(' ', $arr[1]);

        $taskForGame = "{$arrayWhisProgression}";
        $answer = askQuestion($taskForGame, $task, $counter);

        checkAnswer($answer, $hiddenDigit, $name, $counter);
    }
}
