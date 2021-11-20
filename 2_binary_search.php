<?php

function binarySearch(array $array, int $needle, int &$count): int
{
    $start = 0;
    $end = count($array);
    while ($start <= $end) {
        ++$count;

        $middle = floor(($start + $end) / 2);
        if ($array[$middle] === $needle) {
            return $middle;
        }

        if ($needle < $array[$middle]) {
            $end = $middle - 1;
        } else {
            $start = $middle + 1;
        }
    }

    return -1;
}

$count = 0;
$foo = include "0_int_array.php";
// IMPORTANT: sort array before search
sort($foo);

printf("Binary search => found index: %d, number of operations: %d", binarySearch($foo, 100, $count), $count); // O(log_n)
