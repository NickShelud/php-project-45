<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function test()
{
    echo 'test';
}

//function createRandArr()
//{
//    for ($i = 0; $i < 3; $i++) {
//        $arr[] = rand(1, 100, 3);
//    };
//    return $arr;
//}
//$randArr = createRandArr()
//
//function checkForParity($randArr)
//{
//    foreach ($randArr as $item) {
//        if ((int) $item % 2 == 0) {
//            $correctAnswerArr[] = 'yes';
//        } else {
//            $correctAnswerArr[] = 'no'
//        }
//    }
//}
//$correctAnswerArr = checkForParity($randArr);
//
//function checkAnswers()
//{
//    line('fff');
//    $ans = prompt('Your answer:');
//}