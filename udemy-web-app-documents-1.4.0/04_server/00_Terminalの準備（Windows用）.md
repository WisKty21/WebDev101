# Terminalの準備(Windows編)
Windowsの方は、上から順番に作業を進めてください。

<!-- TOC -->

- [Ubuntu をインストール](#ubuntu-%E3%82%92%E3%82%A4%E3%83%B3%E3%82%B9%E3%83%88%E3%83%BC%E3%83%AB)
- [Windows Terminal をインストール](#windows-terminal-%E3%82%92%E3%82%A4%E3%83%B3%E3%82%B9%E3%83%88%E3%83%BC%E3%83%AB)
- [WindowsTerminalの起動時の設定変更](#windowsterminal%E3%81%AE%E8%B5%B7%E5%8B%95%E6%99%82%E3%81%AE%E8%A8%AD%E5%AE%9A%E5%A4%89%E6%9B%B4)
- [test-server.pemをUbuntu側で利用できるようにする](#test-serverpem%E3%82%92ubuntu%E5%81%B4%E3%81%A7%E5%88%A9%E7%94%A8%E3%81%A7%E3%81%8D%E3%82%8B%E3%82%88%E3%81%86%E3%81%AB%E3%81%99%E3%82%8B)
- [Windows上からUbuntuの中のファイルを参照する](#windows%E4%B8%8A%E3%81%8B%E3%82%89ubuntu%E3%81%AE%E4%B8%AD%E3%81%AE%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%82%92%E5%8F%82%E7%85%A7%E3%81%99%E3%82%8B)
- [VSCodeの起動](#vscode%E3%81%AE%E8%B5%B7%E5%8B%95)
    - [vscode の拡張をインストール](#vscode-%E3%81%AE%E6%8B%A1%E5%BC%B5%E3%82%92%E3%82%A4%E3%83%B3%E3%82%B9%E3%83%88%E3%83%BC%E3%83%AB)
    - [Ubuntuから開く](#ubuntu%E3%81%8B%E3%82%89%E9%96%8B%E3%81%8F)

<!-- /TOC -->

## Ubuntu をインストール
1. Windows Subsystem for Linux を有効化する
    1. Windowsの「機能の有効化または無効化」を開く  
    2. 「Linux用Windowsサブシステム」にチェックを入れる  
        ※「Windows Subsystem for Linux」の場合もあります
    3. 再起動
2. Ubuntu をインストール
    1. Windowsの「Microsoft Store」を開く
    2. WindowsStoreで「Ubuntu」を検索し、インストール
    3. Ubuntuを起動
    4. Enter new UNIX username: 使用するアカウント名を入力
    5. Enter new UNIX password:　パスワードを入力
    6. Retype new UNIX password:　同じパスワードを入力

※パスワードは強い権限が必要な操作をするときに必ず必要なパスワードなので忘れないように


## Windows Terminal をインストール
1. Windowsで「Store」を検索し「Windows Store」を開く
2. 「Windows Terminal」で検索し、インストール  
    ※ Previewをを選択肢ないように気をつけてください
3. Windows Terminalを起動
4. 設定を開く
    1. 「スタートアップ」を選択
    2. 「規定のプロファイル」を「Ubuntu」に変更
    3. 保存ボタンを押す


## WindowsTerminalの起動時の設定変更
WindowsTerminalでUbuntuを起動したときのディレクトリの場所を  
利用しやすい場所(Ubuntuのホームディレクトリ)に変更します。

1. Ubuntuを起動する
2. `cd ~` と入力※1を参照
3. `explorer.exe .`と入力(フォルダが開きます) ※1を参照
4. 開いたフォルダのパスをコピー
5. WindowsTerminalの設定を開く
    1. 「Ubuntu」を選択
    2. 「ディレクトリの開始」の項目に、4でコピーしたフォルダのパスを貼り付け
    3. 保存ボタンを押す

※1: 画面上では、以下のように表示されていると思います
```sh
zzz@ZZZZ-ZZZZ:~$ cd ~
zzz@ZZZZ-ZZZZ:~$ explorer.exe .
```
「$」の後の文字を入力します。


## test-server.pemをUbuntu側で利用できるようにする
1. pemファイルが配置しているフォルダをWindowsで開く
2. Ubuntuで `explorer.exe .`と入力してフォルダを開く
3. pemファイルをコピーして、2で開いたフォルダに貼り付ける
4. Ubuntuで`ls -l`と入力してpemファイルが有ることを確認する
5. Ubuntuで`sudo chown username:username test-server.pem`と入力してファイルの所有者を変更する
6. Ubuntuで`ls -l`と入力してファイル所有者が変わっていることを確認する

※5の`username`の部分はUbuntuを最初に起動したときに設定したusernameを指定してください  
※5の実行をするとパスワードが求められますが、Ubuntuを最初に起動したときに設定したパスワードを入力してください


## Windows上からUbuntuの中のファイルを参照する
Ubuntu の中では、 Windowsのファイルは、 /mnt/c/ 以下から参照できます。  

コマンドラインでの操作になれるまでは、フォルダを直接開いて確認することもできます。  
以下をUbuntuのコマンドラインで実行してみてください。
```sh
explorer.exe .
```
ターミナル上でよくわからなくなったら上記コマンドを実行してフォルダを開くことができるので、中身を覗いてみてください。


## VSCodeの起動
Ubuntuの中からVScodeを開くことができます。

### 1. vscode の拡張をインストール
https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.vscode-remote-extensionpack

### 2. Ubuntuから開く
開きたいディレクトリまでカレントディレクトリを移動して`code`コマンドを実行

```
cd ~
code .
```