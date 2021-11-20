<?php

function doFactorial(int $n): int
{
    if ($n <= 0) {
        return -1;
    }

    if ($n === 1) {
        return 1;
    }

    return $n * doFactorial($n - 1);
}

$n = 5;
printf("%d! => %d", $n, doFactorial($n));

function doFibonachi(int $n): int
{
    if ($n <= 0) {
        return -1;
    }

    if ($n === 1 || $n === 2) {
        return 1;
    }

    return doFibonachi($n - 1) + doFibonachi($n - 2);
}

$n = 10;
printf("\r\nFibonachi of %d => %d", $n, doFibonachi($n));
