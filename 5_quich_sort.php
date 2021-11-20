<?php

/**
 * Quick sort with additional memory usage
 *
 * @param array $array
 * @param int $count
 *
 * @return array
 */
function simpleQuickSort (array $array, int &$count): array
{
    $end = count($array);

    if ($end <= 1) {
        return $array;
    }

    $pivot = $array[0];
    $less = [];
    $greater = [];

    for ($index = 1; $index < $end; $index++) {
        ++$count;

        if ($array[$index] < $pivot) {
            $less[] = $array[$index];
        } else {
            $greater[] = $array[$index];
        }
    }

    return array_merge(simpleQuickSort($less, $count), [$pivot], simpleQuickSort($greater, $count));
}

function partition(array &$array, int $leftIndex, int $rightIndex, int &$count): int
{
    $pivot = $array[($leftIndex + $rightIndex) / 2];

    while ($leftIndex <= $rightIndex) {
        ++$count;

        while ($array[$leftIndex] < $pivot) {
            $leftIndex++;
        }

        while ($array[$rightIndex] > $pivot) {
            $rightIndex--;
        }

        if ($leftIndex <= $rightIndex) {
            $tmp = $array[$leftIndex];
            $array[$leftIndex] = $array[$rightIndex];
            $array[$rightIndex] = $tmp;
            $leftIndex++;
            $rightIndex--;
        }
    }

    return $leftIndex;
}

/**
 * In-place quicksort sorts the array by swap array elements within the input array,
 * thus it doesn’t require more storage allocation which in turn improves the efficiency.
 * The trick here is to pass the array to be sorted in the partition function and quickSort
 * function as a reference, so the sorting happens inside the function will
 * directly affect the input array outside the function.
 *
 * @param array $array
 * @param int $leftIndex
 * @param int $rightIndex
 * @param int $count
 */
function quickSort(array &$array, int $leftIndex, int $rightIndex, int &$count): void
{
    $index = partition($array, $leftIndex, $rightIndex, $count);

    if ($leftIndex < $index - 1) {
        quickSort($array, $leftIndex, $index - 1, $count);
    }

    if ($index < $rightIndex) {
        quickSort($array, $index, $rightIndex, $count);
    }
}

$countSimple = 0;
$count = 0;
$foo = include "0_int_array.php";
$fooCopy = $foo;

$sortedSimple = simpleQuickSort($foo, $countSimple);
quickSort($fooCopy, 0, count($fooCopy) - 1, $count);
sort($foo); // for test

if (md5(serialize($sortedSimple)) === md5(serialize($foo))) {
    printf("Simple quick sort => number of operations:: %d", $countSimple);
} else {
    printf("Simple quick sort failed");
}

if (md5(serialize($fooCopy)) === md5(serialize($foo))) {
    printf("\r\nQuick sort => number of operations:: %d", $count);
} else {
    printf("\r\nQuick sort failed");
}
