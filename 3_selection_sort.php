<?php

function selectionSort(array $array, int &$count): array
{
    $end = count($array);

    for ($index = 0; $index < $end; $index++) {
        $indexMin = $index;

        for ($key = $index + 1; $key < $end; $key++) {
            if ($array[$key] < $array[$indexMin]) {
                $indexMin = $key;
            }

            ++$count;
        }

        $tmp = $array[$index];
        $array[$index] = $array[$indexMin];
        $array[$indexMin] = $tmp;
        unset($tmp);
    }

    return $array;
}


$count = 0;
$foo = include "0_int_array.php";
$sorted = selectionSort($foo, $count);
sort($foo); // for test

if (md5(serialize($sorted)) === md5(serialize($foo))) {
    printf("Selection sort => number of operations:: %d", $count); // O(n^2 || 1/2*n*n)
} else {
    printf("Selection sort failed");
}
