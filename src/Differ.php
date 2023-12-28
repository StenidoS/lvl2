<?php

namespace Differ\Differ;

//функции которая принимает два аргумента - JSON строки и складывает значения в один общий массив и выводит его на экран

function genDiff(string $path1, string $path2): string
{
    //return 'Hello, ' . $path1 . ', ' . $path2 . '!';

    $path1 = json_decode($path1, true);
    $path2 = json_decode($path2, true);
    
    $mergedArray = array_merge($path1, $path2);
    
    echo json_encode($mergedArray);
}
