# DockerでWordPressを動かす流れ

## 1. DockerHubでWordPressのイメージを確認
DockerHubで「wordpress」を検索
https://hub.docker.com/_/wordpress
docker-compose用のyamlのサンプルがある

## 2. 作業用ディレクトリを作成
```
mkdir -p ~/work/my_wordpress
cd ~/work/my_wordpress
```

## 3. docker-composeのymlを作成
https://hub.docker.com/_/wordpress
上記ページを参考にして、stack.ymlを作る

vi stack.yml
(もちろんVisualStudioCodeでもOK)

### 3.1. restart(再起動ポリシー)
always コンテナの終了コードにかかわらず、常にコンテナを再起動する

### 3.2. environment(環境変数)
コンテナ内の環境変数を指定する
※環境変数とはサーバー内で利用できる変数のこと
```
env | head -n 3
php -r 'echo $_SERVER["SHELL"];'
```
PHPでも参照できる。もちろん他のアプリケーションからも利用可能。

### 3.3. volumes(データ保管場所)
コンテナが利用し、データを保管するもの。
これを消さない限り、データは消えない。


## 4. 起動

### 4.1. docker-compose up
```
docker-compose -f stack.yml up
docker-compose -f stack.yml up -d
```
* -f (docker-composeのオプション) 構成ファイルを指定
* -d (upのオプション) バックグラウンドで起動できる

※-f を指定しない場合  
カレントディレクトリのdocker-compose.ymlが
自動的に利用される



### 4.2. docker-compose ps
コンテナの状態を確認する
```
docker-compose -f stack.yml ps
```
docker-compose.ymlで構成ファイルを作っていない場合  
毎回-fで指定が必要


## 5. WordPressの表示&初期設定
http://localhost:8080

1. 言語選択：「日本語」を選択
2. サイトのタイトル： お好みで
3. ユーザー名：sample-user
4. パスワード：sample-password
5. メールアドレス： お好みで
6. 検索エンジンでの表示： お好みで


## 6. WordPressの停止、削除
docker-compose downで停止できる
```
docker-compose -f stack.yml down
docker-compose -f stack.yml down -v
```
-v (downのオプション)  
作成したvolume(保存データ)も削除する。  
逆にいうと、
-vを指定しない場合は停止→再度起動しても状態が残る