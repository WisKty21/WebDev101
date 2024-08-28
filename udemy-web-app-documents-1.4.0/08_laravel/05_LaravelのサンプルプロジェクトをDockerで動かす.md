# Laravel のサンプルプロジェクトを Docker で動かす

## 1. Laravelの公式ページでインストール方法を確認
https://laravel.com/docs/10.x/installation
を開く
- Documentation
  - Getting Started
    - Installation

右上にLaravelのバージョンがある
※ 適宜最新のバージョンを参照することをお勧めします。


### 英語のドキュメントについて
Chromeなら右クリックで「日本語に翻訳」を選択すると
ページが翻訳される。

おすすめ: Chromeの拡張機能で「Google 翻訳」を追加  
https://chrome.google.com/webstore/detail/google-translate/aapbdbdomjkkjkaonfhkkikfgjllcleb?hl=ja


## 2. インストール用のコマンドを実行
以下でインストールできる
```
curl -s https://laravel.build/example-app | bash
```
※ URLの`example-app`の部分を好きに変更できる

1. https://laravel.build/ からシェルスクリプトを取得
2. 1のシェルスクリプトをbashで実行

