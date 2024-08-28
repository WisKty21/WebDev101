# windows(Ubuntu)にphpをインストール
このphpインストール方法はWindows(Ubuntu)のための手続きです。  

<!-- TOC -->

- [windowsUbuntuにphpをインストール](#windowsubuntu%E3%81%ABphp%E3%82%92%E3%82%A4%E3%83%B3%E3%82%B9%E3%83%88%E3%83%BC%E3%83%AB)
    - [パッケージマネージャとは？](#%E3%83%91%E3%83%83%E3%82%B1%E3%83%BC%E3%82%B8%E3%83%9E%E3%83%8D%E3%83%BC%E3%82%B8%E3%83%A3%E3%81%A8%E3%81%AF)
    - [phpコマンドが利用できるか確認](#php%E3%82%B3%E3%83%9E%E3%83%B3%E3%83%89%E3%81%8C%E5%88%A9%E7%94%A8%E3%81%A7%E3%81%8D%E3%82%8B%E3%81%8B%E7%A2%BA%E8%AA%8D)
    - [aptを使ったphpインストールまでの流れ](#apt%E3%82%92%E4%BD%BF%E3%81%A3%E3%81%9Fphp%E3%82%A4%E3%83%B3%E3%82%B9%E3%83%88%E3%83%BC%E3%83%AB%E3%81%BE%E3%81%A7%E3%81%AE%E6%B5%81%E3%82%8C)
        - [最新のパッケージ情報を取得 (apt update)](#%E6%9C%80%E6%96%B0%E3%81%AE%E3%83%91%E3%83%83%E3%82%B1%E3%83%BC%E3%82%B8%E6%83%85%E5%A0%B1%E3%82%92%E5%8F%96%E5%BE%97-apt-update)
        - [パッケージを検索 (apt list / apt search)](#%E3%83%91%E3%83%83%E3%82%B1%E3%83%BC%E3%82%B8%E3%82%92%E6%A4%9C%E7%B4%A2-apt-list-or-apt-search)
            - [パッケージが見つからない場合](#%E3%83%91%E3%83%83%E3%82%B1%E3%83%BC%E3%82%B8%E3%81%8C%E8%A6%8B%E3%81%A4%E3%81%8B%E3%82%89%E3%81%AA%E3%81%84%E5%A0%B4%E5%90%88)
        - [パッケージをインストール (apt install)](#%E3%83%91%E3%83%83%E3%82%B1%E3%83%BC%E3%82%B8%E3%82%92%E3%82%A4%E3%83%B3%E3%82%B9%E3%83%88%E3%83%BC%E3%83%AB-apt-install)
        - [パッケージをアンインストール (apt uninstall)](#%E3%83%91%E3%83%83%E3%82%B1%E3%83%BC%E3%82%B8%E3%82%92%E3%82%A2%E3%83%B3%E3%82%A4%E3%83%B3%E3%82%B9%E3%83%88%E3%83%BC%E3%83%AB-apt-uninstall)

<!-- /TOC -->



## パッケージマネージャとは？
- 一つのコマンドでかんたんにパッケージ（コマンドなど）をインストールできるもの
- インストールしたいパッケージに依存しているパッケージも一緒にインストールされる
  - つまり依存のことは気にせずに手軽にインストールができる
- Ubuntuの場合はaptコマンドを使います
  - インタラクティブシェルではaptを推奨するが、apt-getも同じくパッケージ管理のコマンドとしてい利用可能。
  - MacOSの場合はhomebrewが1番メジャーなパッケージマネージャ
  - サーバーで利用されるOSではyumやaptなどOSごとに異なる
  - ちなみにWindows(Ubuntu上ではない)にもchocolateyやscoopなどがある


## phpコマンドが利用できるか確認
```sh
php -v
```
phpがインストールされている場合、バージョン情報が表示されます。  
入っていない場合はインストールしましょう。

## `apt`を使ったphpインストールまでの流れ
かんたんな流れは以下の通りになります。

1. 最新のパッケージ情報を取得 (`apt update`)
2. インストールできるパッケージを探す (`apt list` or `apt search`)
3. パッケージをインストール (`apt install`)

### 最新のパッケージ情報を取得 (`apt update`)
以下のコマンドを実行してパッケージ情報を取得します。
```sh
sudo apt update
```

### パッケージを検索 (`apt list` or `apt search`)
パッケージを検索する場合は、`apt list [パッケージ名]` を実行します。

以下はphp8.0-cliのパッケージを確認しています。
```sh
apt list php8.0-cli
```

以下の用に表示されたらインストール可能です。
```
$ apt list php8.0-cli
Listing... Done
php8.0-cli/focal,now 1:8.0.26-1+ubuntu20.04.1+deb.sury.org+1 amd64 [residual-config]
```

もしくは `apt search [パッケージ名]` でパッケージの部分一致検索ができます。  
以下は、パッケージ名に「php」がついているパッケージを検索します。
```sh
apt search php
```

複数のキーワードを指定する場合
```sh
apt search php cli command
```

#### パッケージが見つからない場合
パッケージを管理しているリポジトリ（保管している場所）に探しているパッケージがないことがあります。  
その場合は、 `add-apt-repository` を実行してリポジトリを追加します。

以下は、php8.0があるリポジトリを追加しています。
```sh
sudo add-apt-repository ppa:ondrej/php 
```
※ ppaとはpersonal package archiveの略です。  
  文字通り個人の管理で、Ubuntuの公式ではないことはご理解ください。  
  追加するリポジトリは情報を確認しておきましょう。  

ppa:ondrej/php の場合、以下に情報があります。
https://launchpad.net/~ondrej/+archive/ubuntu/php/

※ `add-apt-repository`がない場合は `sudo apt-get install software-properties-common` でインストールをしてください。


`add-apt-repository` でリポジトリを追加した後は、 `apt update` を実行してリポジトリ情報を更新しましょう。
```sh
sudo apt update 
```

### パッケージをインストール (`apt install`)
パッケージをインストールする場合は、 `sudo apt install [パッケージ名]` を利用します

以下は、php8.0-cliをインストールしています

```sh
sudo apt install php8.0-cli
```
途中で `Do you want to continue? [Y/n]` と聞かれるので「y」を入力してEnterを押します。  
※確認を出したくない場合は `-y` のオプションを付けてください（ `sudo apt install php8.0-cli -y` )


### パッケージをアンインストール (`apt uninstall`)
`apt uninstall [パッケージ名]` でbrewコマンドでインストールしたパッケージを削除できます。

`apt install php8.0-cli`でphpをインストールした場合は、以下でアンインストールできます。
```sh
sudo apt uninstall php8.0-cli
```
