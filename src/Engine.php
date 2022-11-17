<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

//number of game iterations
const ROUNDS_COUNT = 3;

function launchGame(string $gameDescription, array $round)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line($gameDescription);

    foreach ($round as $gameTask => $correctAnswer) {
        line("Question: {$gameTask}");
        $playerAnswer = prompt("Your answer");

        if ($playerAnswer === (string) $correctAnswer) {
            line("Correct!");
        } else {
            line("'{$playerAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            exit;
        }
    }

    line("Congratulations, %s!", $name);
}
