<?php

const EPS = 0.00001;

function f($x): float
{
    //return log($x) ** 2 + 2 * $x - 5; // вариант 1
    return 0.2 * ($x - 2) ** 4 + 3 * $x - 5; // вариант 2
}

$A = [];
$B = [];

for ($i = -100; $i < 100; $i++) {
    $f1 = f($i - 1);
    $f2 = f($i);

    if ($f1 * $f2 < 0) {
        $A[] = $i - 1;
        $B[] = $i;
    }
}

$M = [];

echo '<h1 class="display-6">Метод дехотомии</h1>';

$count = 0;

for ($i = 0; $i < count($A); $i++) {
    $a = $A[$i];
    $b = $B[$i];

    do {
        $m = ($a + $b) / 2;

        f($a) * f($m) < 0
            ? $b = $m
            : $a = $m;

        $count++;
    } while (($b - $a) / 2 > EPS);

    $M['x'.$i] = $m;
}

echo '<pre>'.print_r($M, true).'</pre>';
echo '<pre>'.print_r($count, true).'</pre>';

echo '<h1 class="display-6">Метод секущих</h1>';

$X = [];

$count = 0;

for ($i = 0; $i < count($A); $i++) {
    $a = $A[$i];
    $b = $B[$i];

    $x0 = $a;
    $x1 = ($a + $b) / 2;
    $x = 0;

    do {
        $x = $x1 - f($x1) * (($x1 - $x0) / (f($x1) - f($x0)));

        $x0 = $x1;

        $x1 = $x;

        $count++;
    } while (abs($x1 - $x0) > EPS);

    $X['x'.$i] = $x;
}

echo '<pre>'.print_r($X, true).'</pre>';
echo '<pre>'.print_r($count, true).'</pre>';
