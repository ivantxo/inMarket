<?php
$date = '2020-10-02';
$dateObj = DateTime::createFromFormat('Y/m/d', $date);
echo $dateObj->format('d-m-Y') . "\n";
