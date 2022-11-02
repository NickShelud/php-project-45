<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

//number of game iterations
const ROUNDS_COUNT = 3;

function gettingName()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function run(array $gameTask, string $task, array $arrayWithCorrectAnswer)
{
    $counter = 0;

    $name = gettingName();
    line($task);

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $question = line("Question: {$gameTask[$i]}");
        $playerAnswer = prompt("Your answer");

        if ($playerAnswer === (string) $arrayWithCorrectAnswer[$i]) {
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
