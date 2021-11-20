<?php

function bubbleSort(array $array, int &$count): array
{
    $end = count($array);

    for ($index = 0; $index + 1 < $end; $index++) {
        for ($key = 0; $key + 1 < $end - $index; $key++) {
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

function combSort(array $array, int &$count): array
{
    $factor = 1.247;
    $end = count($array);
    $step = $end - 1;

    while ($step >= 1) {
        for ($index = 0; $index + $step < $end; $index++) {
            if ($array[$index] > $array[$index + $step]) {
                $tmp = $array[$index];
                $array[$index] = $array[$index + $step];
                $array[$index + $step] = $tmp;
                unset($tmp);
            }
        }

        $step = floor($step / $factor);
    }

    return bubbleSort($array, $count);
}

$count = 0;
$foo = include "0_int_array.php";
$sorted = combSort($foo, $count);
sort($foo); // for test

if (md5(serialize($sorted)) === md5(serialize($foo))) {
    printf("Comp sort => number of operations:: %d", $count);
} else {
    printf("Comp sort failed");
}
