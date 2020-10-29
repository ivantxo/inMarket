<?php

$r1 = array('left' => 10, 'right' => 30, 'top' => 10, 'bottom' => 30);
$r2 = array('left' => 20, 'right' => 50, 'top' => 20, 'bottom' => 50);
$r3 = array('left' => 70, 'right' => 90, 'top' => 70, 'bottom' => 90);

function intersectRect($r1, $r2): bool
{
    if ($r1['right'] < $r2['left']
        || $r1['left'] > $r2['right']
        || $r1['bottom'] < $r2['top']
        || $r1['top'] > $r2['bottom']
    ) {
        return 0;
    } else {
        return 1;
    }
}

echo 'r1, r2: ' . (intersectRect($r1, $r2) ? 'intersect' : 'do not intersect') . PHP_EOL;
echo 'r1, r3: ' . (intersectRect($r1, $r3) ? 'intersect' : 'do not intersect') . PHP_EOL;
