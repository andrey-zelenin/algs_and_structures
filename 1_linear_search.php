<?php

function linearSearch(array $array, int $needle, int &$count): int
{
    $end = count($array);

    for ($index = 0; $index < $end; $index++) {
        ++$count;

        if ($array[$index] === $needle) {
            return $index;
        }
    }

    return -1;
}

$count = 0;
$foo = include "0_int_array.php";

printf("Linear search => found index: %d, number of operations: %d", linearSearch($foo, 100, $count), $count); // O(n)

