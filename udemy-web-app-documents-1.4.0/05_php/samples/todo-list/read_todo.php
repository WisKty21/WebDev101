<?php

$handle = fopen('todo_list.csv', 'r');

$row1 = fgetcsv($handle);
$row2 = fgetcsv($handle);
$row3 = fgetcsv($handle);
$row4 = fgetcsv($handle);
$row5 = fgetcsv($handle);

var_dump($row1);
var_dump($row3);

fclose($handle);

