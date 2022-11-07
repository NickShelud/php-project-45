<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

//number of game iterations
const ROUNDS_COUNT = 3;

function run(array $gameTask, string $task, array $arrayWithCorrectAnswer)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line($task);

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $question = line("Question: {$gameTask[$i]}");
        $playerAnswer = prompt("Your answer");

        if ($playerAnswer === (string) $arrayWithCorrectAnswer[$i]) {
            line("Correct!");
        } else {
            line("'{$playerAnswer}' is wrong answer ;(. Correct answer was '{$arrayWithCorrectAnswer[$i]}'.");
            line("Let's try again, {$name}!");
            exit;
        }
    }
    line("Congratulations, %s!", $name);
}
