<?php

namespace BrainGames\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\createRandArr;
use function BrainGames\Engine\congratulations;
use function BrainGames\Engine\printMessageWrongAnswer;

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

function progression(string $name)
{
    $counter = 0;

    line('What number is missing in the progression?');

    for ($i = 0; $i < 3; $i++) {
        $arrRand = createRandProgression();
        $arr = choiceRandDigit($arrRand);
        $hiddenDigit = $arr[0];
        $arrayWhisProgression = implode(' ', $arr[1]);

        line("Question: {$arrayWhisProgression}");
        $answer = prompt("Your answer");

        if ((int) $answer === $hiddenDigit) {
            line("Correct!");
            $counter++;
        } else {
            printMessageWrongAnswer($hiddenDigit, $answer, $name);
            exit;
        }
    }
    congratulations($counter, $name);
}
