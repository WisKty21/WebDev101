# PHPファイルの読み込み（include・require）
PHPでは別のファイルを読み込み、あたかも一つのファイルに書かれたとおりに実行することができます。  
この機能を使うことで、一つのファイルが膨大にならず、混乱を避けることができるのでファイルが大きくなる場合は別のファイルに分けていきましょう。  

<!-- TOC -->

- [HTMLのテンプレートファイルを読み込んで出力する](#html%E3%81%AE%E3%83%86%E3%83%B3%E3%83%97%E3%83%AC%E3%83%BC%E3%83%88%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%82%92%E8%AA%AD%E3%81%BF%E8%BE%BC%E3%82%93%E3%81%A7%E5%87%BA%E5%8A%9B%E3%81%99%E3%82%8B)
- [別のPHPファイルに書いている機能を利用する](#%E5%88%A5%E3%81%AEphp%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%81%AB%E6%9B%B8%E3%81%84%E3%81%A6%E3%81%84%E3%82%8B%E6%A9%9F%E8%83%BD%E3%82%92%E5%88%A9%E7%94%A8%E3%81%99%E3%82%8B)
- [include と require の違い](#include-%E3%81%A8-require-%E3%81%AE%E9%81%95%E3%81%84)

<!-- /TOC -->


## HTMLのテンプレートファイルを読み込んで出力する

基本文法
```php
include '[ファイルのパス]';
```

サンプルコードは以下を参照してください。

- [./samples/include-and-require/include_sample.php](./samples/include-and-require/include_sample.php)
- [./samples/include-and-require/included_file.php](./samples/include-and-require/included_file.php)

※サンプルコード内にかかれている`__DIR__`というのは、そのPHPが実行されているディレクトリを表します。  
(echoしてみると実際の値が確認できます)

サンプルの出力結果
```
$ php include_sample.php
<html>
  <body>Hello! PHP!</body>
</html>
```


## 別のPHPファイルに書いている機能を利用する

基本構文
```php
require '[ファイルのパス]';
```

サンプルコードは以下を参照してください。

- [./samples/include-and-require/require_sample.php](./samples/include-and-require/require_sample.php)
- [./samples/include-and-require/required_file.php](./samples/include-and-require/required_file.php)

出力
```
$ php require_sample.php
Hello PHP!
```


## include と require の違い
ファイルの中に書いている内容はPHPとして評価されるという点では、requireとincludeは全く同じです。  
しかし以下の違いがあります。

- requrie
  - ファイルが存在しない場合、requireの記述のあとは実行されない(エラーが出力され終了する)
- include
  - ファイルが存在しなくても、includeの記述のあとの処理も実行される(エラーは出力されるが、継続して処理が実行される)
