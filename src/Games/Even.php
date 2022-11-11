<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\gameLounch;

use const BrainGames\Engine\ROUNDS_COUNT;

const TASK = 'Answer "yes" if the number is even, otherwise answer "no".';

function run()
{
    $gameData = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $randDigit = rand(1, 100);
        $gameData['digit'][] = $randDigit;
    }

    gameLounch(TASK, isEven($gameData));
}

function isEven(array $dataForGame)
{
    $correctAnswer = [];
    $randDigit = $dataForGame['digit'];
    $questionsAndAnswers = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        if ((int) $randDigit[$i] % 2 === 0) {
            $questionsAndAnswers["{$randDigit[$i]}"] = 'yes';
        } else {
            $questionsAndAnswers["{$randDigit[$i]}"] = 'no';
        }
    }

    return $questionsAndAnswers;
}
