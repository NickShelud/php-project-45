<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

//number of game iterations
const COUNT_ITERATION = 3;

function run(array $gameTask, string $task, array $arrayWithCorrectAnswer, string $name)
{
    $counter = 0;
    for ($i = 0; $i < 3; $i++) {
        if ($counter === 0) {
            line($task);
        }

        $question = line("Question: {$gameTask[$i]}");
        $playerAnswer = prompt("Your answer");

        if ((string) $playerAnswer === (string) $arrayWithCorrectAnswer[$i]) {
            line("Correct!");
            $counter += 1;
            if ($counter === 3) {
                line("Congratulations, %s!", $name);
            }
        } else {
            line("'{$playerAnswer}' is wrong answer ;(. Correct answer was '{$arrayWithCorrectAnswer[$i]}'.");
            line("Let's try again, {$name}!");
            exit;
        }
    }
}
