# クイズのサンプルのプログラムについて

<!-- TOC -->

- [実行方法](#%E5%AE%9F%E8%A1%8C%E6%96%B9%E6%B3%95)
    - [カレントディレクトリをhtmlディレクトリまで移動する](#%E3%82%AB%E3%83%AC%E3%83%B3%E3%83%88%E3%83%87%E3%82%A3%E3%83%AC%E3%82%AF%E3%83%88%E3%83%AA%E3%82%92html%E3%83%87%E3%82%A3%E3%83%AC%E3%82%AF%E3%83%88%E3%83%AA%E3%81%BE%E3%81%A7%E7%A7%BB%E5%8B%95%E3%81%99%E3%82%8B)
    - [PHPのビルトインウェブサーバーを起動する](#php%E3%81%AE%E3%83%93%E3%83%AB%E3%83%88%E3%82%A4%E3%83%B3%E3%82%A6%E3%82%A7%E3%83%96%E3%82%B5%E3%83%BC%E3%83%90%E3%83%BC%E3%82%92%E8%B5%B7%E5%8B%95%E3%81%99%E3%82%8B)
    - [ブラウザで確認](#%E3%83%96%E3%83%A9%E3%82%A6%E3%82%B6%E3%81%A7%E7%A2%BA%E8%AA%8D)

<!-- /TOC -->

## ディレクトリ構造
ドキュメントルートは以下の通り、`html`ディレクトリにします。
```
./src
├── README.md          // この資料(非公開)
├── html               // ドキュメントルート(公開)
│   ├── answer.php
│   ├── index.php
│   ├── question.php
│   ├── questions.js
│   └── style.css
├── lib               // ライブラリ用ディレクトリ(非公開)
│   ├── data.csv
│   └── functions.php
└── template          // HTMLの中にPHPを含んだテンプレート用ディレクトリ(非公開)
    ├── 404.tpl.php
    ├── index.tpl.php
    └── question.tpl.php
```
`answer.php` の中から`functions.php`を参照する場合は、  `../lib/functions.php`を指定します。


## 実行方法

### 1. カレントディレクトリをhtmlディレクトリまで移動する
```
cd src/html
```
※ `src/html` 実際のファイル配置場所を指定してください。


### 2. PHPのビルトインウェブサーバーを起動する
```
php -S localhost:8080
```

### 3. ブラウザで確認
以下にアクセスします。

http://localhost:8080

