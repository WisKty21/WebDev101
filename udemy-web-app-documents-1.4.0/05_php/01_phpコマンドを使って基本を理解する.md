# phpコマンドを使って基本を理解する

<!-- TOC -->

- [コマンドラインインターフェイス=cli起動](#%E3%82%B3%E3%83%9E%E3%83%B3%E3%83%89%E3%83%A9%E3%82%A4%E3%83%B3%E3%82%A4%E3%83%B3%E3%82%BF%E3%83%BC%E3%83%95%E3%82%A7%E3%82%A4%E3%82%B9cli%E8%B5%B7%E5%8B%95)
- [PHPファイルをコマンドで実行](#php%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%82%92%E3%82%B3%E3%83%9E%E3%83%B3%E3%83%89%E3%81%A7%E5%AE%9F%E8%A1%8C)
- [HTMLの中にPHPを組み込む](#html%E3%81%AE%E4%B8%AD%E3%81%ABphp%E3%82%92%E7%B5%84%E3%81%BF%E8%BE%BC%E3%82%80)
- [PHPのBuild-in WebServerビルトインウェブサーバーを使う](#php%E3%81%AEbuild-in-webserver%E3%83%93%E3%83%AB%E3%83%88%E3%82%A4%E3%83%B3%E3%82%A6%E3%82%A7%E3%83%96%E3%82%B5%E3%83%BC%E3%83%90%E3%83%BC%E3%82%92%E4%BD%BF%E3%81%86)
    - [displayNow.phpがあるディレクトリまでカレントディレクトリを移動する](#displaynowphp%E3%81%8C%E3%81%82%E3%82%8B%E3%83%87%E3%82%A3%E3%83%AC%E3%82%AF%E3%83%88%E3%83%AA%E3%81%BE%E3%81%A7%E3%82%AB%E3%83%AC%E3%83%B3%E3%83%88%E3%83%87%E3%82%A3%E3%83%AC%E3%82%AF%E3%83%88%E3%83%AA%E3%82%92%E7%A7%BB%E5%8B%95%E3%81%99%E3%82%8B)
    - [Built-in WebServerを起動する](#built-in-webserver%E3%82%92%E8%B5%B7%E5%8B%95%E3%81%99%E3%82%8B)
    - [ビルトインサーバーのURLにアクセス](#%E3%83%93%E3%83%AB%E3%83%88%E3%82%A4%E3%83%B3%E3%82%B5%E3%83%BC%E3%83%90%E3%83%BC%E3%81%AEurl%E3%81%AB%E3%82%A2%E3%82%AF%E3%82%BB%E3%82%B9)
    - [補足1: ドキュメントルートについて](#%E8%A3%9C%E8%B6%B31-%E3%83%89%E3%82%AD%E3%83%A5%E3%83%A1%E3%83%B3%E3%83%88%E3%83%AB%E3%83%BC%E3%83%88%E3%81%AB%E3%81%A4%E3%81%84%E3%81%A6)
    - [補足2: ビルトインサーバーの詳しい情報](#%E8%A3%9C%E8%B6%B32-%E3%83%93%E3%83%AB%E3%83%88%E3%82%A4%E3%83%B3%E3%82%B5%E3%83%BC%E3%83%90%E3%83%BC%E3%81%AE%E8%A9%B3%E3%81%97%E3%81%84%E6%83%85%E5%A0%B1)

<!-- /TOC -->

## コマンドラインインターフェイス=cli起動
ターミナルで以下を実行すると、PHPがコマンドラインで実行できます
```sh
php -a
```

起動後に`echo`を実行
```
php > echo 'hello world!';
hello world!
```

cliの終了はCtrlを押しながらCキーを押してください（Ctrl + C)

## PHPファイルをコマンドで実行
sample.phpのファイルをそのまま実行したい場合は、phpコマンドの後にファイルのパスを指定することで実行可能です
```sh
php [実行したいファイルのパス]
```

sample.phpの中身
```php
<?php
echo 'Hello PHP!';
```
実行結果
```
$ php sample.php
Hello PHP!% 
```

## HTMLの中にPHPを組み込む
PHPの開始タグ(`<?`)、終了タグ(`?>`)の中はPHPを実行できます。  

例
```php
<?php echo 'Hello PHP!'; ?>
```

上記を使って、HTMLの中にPHPを組み込むことが可能です。  

displayNow.phpの中身
```html
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
```

phpコマンドを使って出力される内容を確認
```
php displayNow.php
```

出力結果
```
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
    今は、2021年04月26日 23時49分45秒です。<br>
    ※表示している時間のタイムゾーンは、UTCです。
</body>
</html>
```
※時間の部分は実行するたびに変化します。


## PHPのBuild-in WebServer(ビルトインウェブサーバー)を使う
PHPのコマンドを使うと簡易的なサーバーをローカル環境で用意できます。  
コレを利用すると、PHPファイルをサーバーに配置したときの動作を確認できます。

例として、ひとつ上の項目の`displayNow.php`を実際にブラウザで確認するための流れを書いておきます。

### 1. `displayNow.php`があるディレクトリまでカレントディレクトリを移動する
```sh
$ ls
displayNow.php
```
※`cd`コマンドや`pwd`コマンドを駆使してカレントディレクトリを移動してみてください。

### 2. Built-in WebServerを起動する
カレントディレクトリが**ドキュメントルート**になります。
```sh
php -S localhost:8080
```
※終了はCtrlを押しながらCキーを押してください（Ctrl + C)

### 3. ビルトインサーバーのURLにアクセス
以下のURLにアクセスしてください

http://localhost:8080/displayNow.php

`http://localhost:8080/`のあとにドキュメントルート以下にあるファイルを指定します。  

### 補足1: ドキュメントルートについて
ドキュメントルートより上の階層のファイルは参照できません。

例えば、以下のディレクトリ構造があるとします。
```
/
└── Users
    └── username
        ├── Documents
        │   ├── src   <----------------- ドキュメントルート
        │   |   ├── index.html
        │   |   ├── style.css
        │   |   └── img
        │   |       └── public.png
        │   └── docs
        │       └── README.md
        └── Pictures
            ├── awesome.png
            └── lgtm.gif
```
ここで、`/Users/username/Documents/src` をドキュメントルートに指定します。  
すると以下のような状態になります。

- 参照できるURL
  - http://localhost:8080/index.html
  - http://localhost:8080/style.css
  - http://localhost:8080/img/public.png
- 参照できないURL
  - http://localhost:8080/../docs/README.md
  - http://localhost:8080/../../Pictures/awesome.png
  - http://localhost:8080/../../Pictures/lgtm.png

※ `../` は一つ上の階層のディレクトリを指します

### 補足2: ビルトインサーバーの詳しい情報
より詳しい情報は以下を参照してください  
https://www.php.net/manual/ja/features.commandline.webserver.php

