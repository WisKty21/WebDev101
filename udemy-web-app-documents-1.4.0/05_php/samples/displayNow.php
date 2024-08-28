<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>時刻のお知らせ(PHPで出力)</title>
</head>
<body>
    <h1>時刻のお知らせ</h1>
    今は、<?php echo date('Y年m月d日 H時i分s秒'); ?>です。<br>
    ※表示している時間のタイムゾーンは、<?php echo date('e'); ?>です。
</body>
</html>
