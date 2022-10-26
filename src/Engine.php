<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

//number of game iterations
const COUNT_ITERATION = 3;

function run(string $taskForGame, string $task, string $correctAnswer, string $name, int $counter)
{
    if ($counter === 0) {
        line($task);
    }

    $Question = line("Question: {$taskForGame}");
    $playerAnswer = prompt("Your answer");

    if ($playerAnswer === $correctAnswer) {
        line("Correct!");
        if ($counter === 2) {
            line("Congratulations, %s!", $name);
        }
    } else {
        line("'{$playerAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
        line("Let's try again, {$name}!");
        exit;
    }
}
