<?php

function fetchById($id) {
    // 開く
    $handler = fopen(__DIR__.'/data.csv', 'r');
    // 取得
    $question = [];
    while ($row = fgetcsv($handler)) {    
        if (isDataRow($row)) {
            if ($row[0] === $id) {
                $question =$row;
                break;
            }
        }
    }

    // 閉じる
    fclose($handler);

    // 返す
    return $question;
}

function isDataRow(array $row)
{
    // データの項目数が足りているか判定
    if (count($row) !== 8) {
        return false;
    }

    // データの項目の中身がすべて埋まっているか確認する
    foreach ($row as $value) {
        // 項目の値が空か判定
        if (empty($value)) {
            return false;
        }
    }

    // idの項目が数字ではない場合は無視する
    if (!is_numeric($row[0])) {
        return false;
    }

    // 正しい答えはa,b,c,dのどれか
    $correctAnswer = strtoupper($row[6]);
    $availableAnswers = ['A', 'B', 'C', 'D'];
    if (!in_array($correctAnswer, $availableAnswers)) {
        return false;
    }

    // すべてチェックが問題なければtrue
    return true;
}


/**
 * 取得できたクイズのデータ1行を利用しやすいように連想配列に変換
 * 値をHTMLに組み込めるようにエスケープも行う
 *
 * @param array $data クイズ情報(1問分)
 *
 * @return array 整形したクイズの情報
 */
function generateFormattedData($data)
{
    // 構造化した配列を作成する
    $formattedData = [
        'id' => escape($data[0]),
        'question' => escape($data[1], true),
        'answers' => [
            'A' => escape($data[2]),
            'B' => escape($data[3]),
            'C' => escape($data[4]),
            'D' => escape($data[5]),
        ],
        'correctAnswer' => escape(strtoupper($data[6])),
        'explanation' => escape($data[7], true),
    ];

    return $formattedData;
}

/**
 * HTMLに組み込むために必要なエスケープ処理を行う
 *
 * @param string $data エスケープしたい情報
 * @param bool $nl2br 改行を<br>に変換する場合はtrue
 *
 * @return string エスケープ済の文字列
 */
function escape($data, $nl2br = false)
{
    // HTMLに埋め込んでも大丈夫な文字に変換する
    $convertedData = htmlspecialchars($data, ENT_HTML5);

    // 改行コードを<br>タグに変換するか判定
    if ($nl2br) {
        /// 改行コードを<br>タグに変換したものをを返却
        return nl2br($convertedData);
    }

    return $convertedData;
}
