<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

//welcomes the player and asks for their name
function gettingName()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}
