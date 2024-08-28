# macにphpをインストール
このphpインストール方法はmacOSのための手続きです。  

<!-- TOC -->

- [macにphpをインストール](#mac%E3%81%ABphp%E3%82%92%E3%82%A4%E3%83%B3%E3%82%B9%E3%83%88%E3%83%BC%E3%83%AB)
    - [PHPインストールまでの流れ](#php%E3%82%A4%E3%83%B3%E3%82%B9%E3%83%88%E3%83%BC%E3%83%AB%E3%81%BE%E3%81%A7%E3%81%AE%E6%B5%81%E3%82%8C)
    - [homebrewをインストール](#homebrew%E3%82%92%E3%82%A4%E3%83%B3%E3%82%B9%E3%83%88%E3%83%BC%E3%83%AB)
        - [パッケージマネージャとは？](#%E3%83%91%E3%83%83%E3%82%B1%E3%83%BC%E3%82%B8%E3%83%9E%E3%83%8D%E3%83%BC%E3%82%B8%E3%83%A3%E3%81%A8%E3%81%AF)
        - [brewコマンドがインストールされいているか確認する](#brew%E3%82%B3%E3%83%9E%E3%83%B3%E3%83%89%E3%81%8C%E3%82%A4%E3%83%B3%E3%82%B9%E3%83%88%E3%83%BC%E3%83%AB%E3%81%95%E3%82%8C%E3%81%84%E3%81%A6%E3%81%84%E3%82%8B%E3%81%8B%E7%A2%BA%E8%AA%8D%E3%81%99%E3%82%8B)
        - [homebrewbrewコマンドのインストール方法](#homebrewbrew%E3%82%B3%E3%83%9E%E3%83%B3%E3%83%89%E3%81%AE%E3%82%A4%E3%83%B3%E3%82%B9%E3%83%88%E3%83%BC%E3%83%AB%E6%96%B9%E6%B3%95)
        - [brewコマンドのアップデート](#brew%E3%82%B3%E3%83%9E%E3%83%B3%E3%83%89%E3%81%AE%E3%82%A2%E3%83%83%E3%83%97%E3%83%87%E3%83%BC%E3%83%88)
    - [phpをインストール](#php%E3%82%92%E3%82%A4%E3%83%B3%E3%82%B9%E3%83%88%E3%83%BC%E3%83%AB)
        - [brew search コマンドでインストール可能なphpのパッケージを検索](#brew-search-%E3%82%B3%E3%83%9E%E3%83%B3%E3%83%89%E3%81%A7%E3%82%A4%E3%83%B3%E3%82%B9%E3%83%88%E3%83%BC%E3%83%AB%E5%8F%AF%E8%83%BD%E3%81%AAphp%E3%81%AE%E3%83%91%E3%83%83%E3%82%B1%E3%83%BC%E3%82%B8%E3%82%92%E6%A4%9C%E7%B4%A2)
        - [brew install コマンドでパッケージをインストール](#brew-install-%E3%82%B3%E3%83%9E%E3%83%B3%E3%83%89%E3%81%A7%E3%83%91%E3%83%83%E3%82%B1%E3%83%BC%E3%82%B8%E3%82%92%E3%82%A4%E3%83%B3%E3%82%B9%E3%83%88%E3%83%BC%E3%83%AB)
    - [phpコマンドを使いやすくするPATHを通す](#php%E3%82%B3%E3%83%9E%E3%83%B3%E3%83%89%E3%82%92%E4%BD%BF%E3%81%84%E3%82%84%E3%81%99%E3%81%8F%E3%81%99%E3%82%8Bpath%E3%82%92%E9%80%9A%E3%81%99)
        - [解説](#%E8%A7%A3%E8%AA%AC)
            - [文字をファイルに追記](#%E6%96%87%E5%AD%97%E3%82%92%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%81%AB%E8%BF%BD%E8%A8%98)
            - [環境変数を定義](#%E7%92%B0%E5%A2%83%E5%A4%89%E6%95%B0%E3%82%92%E5%AE%9A%E7%BE%A9)
            - [もともとあった変数に文字を追加する](#%E3%82%82%E3%81%A8%E3%82%82%E3%81%A8%E3%81%82%E3%81%A3%E3%81%9F%E5%A4%89%E6%95%B0%E3%81%AB%E6%96%87%E5%AD%97%E3%82%92%E8%BF%BD%E5%8A%A0%E3%81%99%E3%82%8B)
            - [環境変数PATHは何に利用されるのか](#%E7%92%B0%E5%A2%83%E5%A4%89%E6%95%B0path%E3%81%AF%E4%BD%95%E3%81%AB%E5%88%A9%E7%94%A8%E3%81%95%E3%82%8C%E3%82%8B%E3%81%AE%E3%81%8B)
            - [.zshrc とは？](#zshrc-%E3%81%A8%E3%81%AF)
    - [phpをアンインストール](#php%E3%82%92%E3%82%A2%E3%83%B3%E3%82%A4%E3%83%B3%E3%82%B9%E3%83%88%E3%83%BC%E3%83%AB)

<!-- /TOC -->

## PHPインストールまでの流れ
1. homebrewをインストール
2. phpのインストール
3. phpコマンドを使いやすくする(PATHを通す)

## homebrewをインストール
macOS（またはLinux）用パッケージマネージャー — Homebrew  
[https://brew.sh/index_ja](https://brew.sh/index_ja)  

### パッケージマネージャとは？
- 一つのコマンドでかんたんにパッケージ（コマンドなど）をインストールできるもの
- インストールしたいパッケージに依存しているパッケージも一緒にインストールされる
  - つまり依存のことは気にせずに手軽にインストールができる
- MacOSの場合はhomebrewが1番メジャーなパッケージマネージャ
  - サーバーで利用されるOSではyumやaptなどOSごとに異なる
  - ちなみにWindowsにもchocolateyやscoopなどがある

### brewコマンドがインストールされいているか確認する
```sh
brew --version
```
コレで「command not found」と出たらbrewコマンドはインストールされていないので、1.3のインストールへ進んでください。  
もし、バージョン情報が表示された場合はbrewコマンドがインストールされているので、1.3は飛ばして1.4のアップデートを実行してください。


### brewコマンドのアップデート
すでにbrewコマンドが入っている場合は、以下のコマンドでhomebrew自体を最新にしてください。
```sh
brew update
```
※時間がかかることがあるのでしばらく放置して休憩しましょう☕️


### homebrew(brewコマンド)のインストール方法

macOS（またはLinux）用パッケージマネージャー — Homebrew  
[https://brew.sh/index_ja](https://brew.sh/index_ja)  
インストールコマンドを実行するのみです。

エラーが出る場合:
```
You have not agreed to the Xcode license.
Before running the installer again please agree to the license by opening
Xcode.app or running:
    sudo xcodebuild -license
```
上記、の場合は、Xcodeを起動して、利用規約に同意してください。  
あるいはコマンド `sudo xcodebuild -license` を実行して利用規約に合意してください。  
(j で下に移動、 k で上に移動、 Shift+Gで一番下まで移動します。最後まで見たらエンターを押して入力できるようになるので「agree」と入力してエンターを押します)


### brewの初期設定
インストールすると以下のようなメッセージが表示されます。
※ インストール後のメッセージはbrewのバージョンによって異なりますので実行後の画面をご確認ください。
```
==> Installation successful!

==> Homebrew has enabled anonymous aggregate formulae and cask analytics.
Read the analytics documentation (and how to opt-out) here:
  https://docs.brew.sh/Analytics
No analytics data has been sent yet (nor will any be during this install run).

==> Homebrew is run entirely by unpaid volunteers. Please consider donating:
  https://github.com/Homebrew/brew#donations

==> Next steps:
- Run these three commands in your terminal to add Homebrew to your PATH:
    echo '# Set PATH, MANPATH, etc., for Homebrew.' >> /Users/ユーザ名/.zprofile
    echo 'eval "$(/opt/homebrew/bin/brew shellenv)"' >> /Users/ユーザ名/.zprofile
    eval "$(/opt/homebrew/bin/brew shellenv)"
- Run brew help to get started
- Further documentation:
    https://docs.brew.sh
```
`==> Next steps` と書いている部分に注目してください。ここに次に行うことが書かれています。  
上記の場合は、echoコマンドが二つ、evalコマンドが一つあるので、それらを実行します。

※ くどいようですが、インストールした時に実行したマシンの画面に表示された内容が正しいです。上記をそのまま実行しないようにお願いします。


## phpをインストール

### `brew search` コマンドでインストール可能なphpのパッケージを検索
```sh
brew search php
```

以下のように出ます。（以下は色々省略しています）
```
==> Formulae
php@7.4 php@8.0 ✔ 

==> Casks
eclipse-php
```
チェックが付いているものはインストール済で、チェックが付いていないものはインストールされていないパッケージです。

### `brew install` コマンドでパッケージをインストール
`brew search` コマンドで見つかったパッケージは `brew install` コマンドでインストールできます。

PHP8.0をインストールする場合
```sh
brew install php@8.0
```
※依存しているパッケージもインストールされるため時間がかかります。放置して休憩しましょう☕️

インストールされたら、以下でインストールされたディレクトリを確認できます。
```sh
brew --prefix php@8.0
```

例：php@7.4のインストール場所を確認
```
$ brew --prefix php@8.0
/opt/homebrew/opt/php@8.0
```
上記の場合、phpコマンドは `/opt/homebrew/opt/php@8.0/bin/php` にあります。

例：php@8.0のコマンドを実行
```
$ /opt/homebrew/opt/php@8.0/bin/php -v
PHP 8.0.26 (cli) (built: Nov 28 2022 11:26:42) ( NTS )
Copyright (c) The PHP Group
Zend Engine v4.0.26, Copyright (c) Zend Technologies
    with Zend OPcache v8.0.26, Copyright (c), by Zend Technologies
```

## phpコマンドを使いやすくする(PATHを通す)
`/opt/homebrew/opt/php@8.0/bin/php` を毎回指定するのは面倒臭いので、`php`と入力するだけで利用できるように設定をします。

まずは以下で情報を確認します。
```sh
brew info php@8.0
```

`brew info` コマンドの実行結果の以下の部分に注目してください。
```
If you need to have php@8.0 first in your PATH, run:
  echo 'export PATH="/opt/homebrew/opt/php@8.0/bin:$PATH"' >> ~/.zshrc
  echo 'export PATH="/opt/homebrew/opt/php@8.0/sbin:$PATH"' >> ~/.zshrc
```
このコマンドを実行したらOKです。
※ php@8.1 は上記がないことを確認済みです（試しにphp -vを実行してバージョンが表示されたら既にPATHは通っていますので対応不要です） 

```sh
echo 'export PATH="/opt/homebrew/opt/php@8.0/bin:$PATH"' >> ~/.zshrc
```
※このコマンドをそのまま使うのではなく、`brew info` コマンドで表示されたものを使用してください。

上記のコマンドが実行された後に、以下を実行してください。
```sh
source ~/.zshrc
```

以下でphpコマンドを利用できることが確認できます。
```sh
php -v
```

以下は、phpのコマンドがある場所を確認できます。
```sh
which php
```

### 解説
```sh
echo 'export PATH="/opt/homebrew/opt/php@8.0/bin:$PATH"' >> ~/.zshrc
```
このコマンドが何をしていたのか、一つずつ解説します。

#### 文字をファイルに追記
以下で`~/sample`ファイルに「Hello world!」という文字を追記されます
```sh
echo 'Hello world!' >> ~/sample
```

#### 環境変数を定義
以下で環境変数「HOGE」を定義できます。
```sh
export HOGE="環境変数を設定"
```

#### もともとあった変数に文字を追加する
```sh
HOGE="もともとあった文字"
HOGE="前に追加する文字 $HOGE"
```
上記を実行すると`HOGE`の中には  
「前に追加する文字 もともとあった文字」  
という文字が入ります。

#### 環境変数PATH(コマンド検索パス)は何に利用されるのか
コマンドを実行すると、実際にはそのコマンド名のファイルに実装されている処理が動きます。  
例えば ls コマンドは `/bin/ls`が実行されます。

そして、その実行ファイルがどこにあるかということを示しているのが環境変数のPATHです。

以下を実行すると環境変数のPATHの中身を見ることができます。
```sh
printenv PATH
```
コロンで複数のディレクトリが指定されているので  
以下を使うとどのディレクトリが指定されているか見やすくなります。
```sh
printenv PATH | sed -e "s/:/\n/g"
```
コマンドを実行するとここで指定されているディレクトリの中にある実行ファイルを見つけて実行してくれます。  
つまりphpコマンドの実行ファイルを環境変数のPATHに追加したらphpのコマンドが実行できます。

コレを「パスを通す」ということがあります。

#### `.zshrc` とは？
`.zshrc` というファイルは、  
コマンドを一つずつ入力して実行できる環境のシェル(インタラクティブシェル)が起動するときに必ず読み込まれるファイルです。
毎回起動するたびに設定をする必要があるものは、  
起動時に自動的に設定されるよう`~/.zshrc`に記述します。

今回は環境変数PATHを更新するexportを追加しています。


## phpをアンインストール
`brew uninstall [パッケージ名]` でbrewコマンドでインストールしたパッケージを削除できます。

`brew install php@8.0`でphpをインストールした場合は、以下でアンインストールできます。
```sh
brew uninstall php@8.0
```
※PATHを通している場合は、`.zshrc` ファイルからも不要な設定を削除してください。
