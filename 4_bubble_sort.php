<?php

function bubbleSort(array $array, int &$count): array
{
    $end = count($array);

    for ($index = 0; $index + 1 < $end; $index++) {
        for ($key = 0; $key + 1 < $end; $key++) {
            if ($array[$key + 1] < $array[$key]) {
                $tmp = $array[$key];
                $array[$key] = $array[$key + 1];
                $array[$key + 1] = $tmp;
                unset($tmp);
            }

            ++$count;
        }
    }

    return $array;
}

$count = 0;
$foo = include "0_int_array.php";
$sorted = bubbleSort($foo, $count);
sort($foo); // for test

if (md5(serialize($sorted)) === md5(serialize($foo))) {
    printf("Bubble sort => number of operations:: %d", $count); // O(n*n)
} else {
    printf("Bubble sort failed");
}
