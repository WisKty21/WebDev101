<?php

$handle = fopen('todo_list.csv', 'a');

$row = [
  "5",
  "2021-05-20",
  "yet",
  "PHPを理解する",
];
fputcsv($handle, $row);

fclose($handle);

