<?php

require __DIR__.'/../lib/functions.php';

$id = '3';

$data = fetchById($id);

$formattedData = generateFormattedData($data);

// $question = htmlspecialchars(nl2br($data[1])); #nl2br→改行
$question = $formattedData['question'];

// $answers = [
//     'A' => $data[2],
//     'B' => $data[3],
//     'C' => $data[4],
//     'D' => $data[5],
// ];
$answers = $formattedData['answers'];

// $correctAnswer = strtoupper($data[6]);
$correctAnswer = $formattedData['correctAnswer'];
// $correctAnswerValue = $answers[$correctAnswer];
$correctAnswerValue = $answers[$correctAnswer];
$explanation = $formattedData['explanation'];



$explanation = nl2br(htmlspecialchars($data[7]));

include __DIR__.'/../template/question.tpl.php';
