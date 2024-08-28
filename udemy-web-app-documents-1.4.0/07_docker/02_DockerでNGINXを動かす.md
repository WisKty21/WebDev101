# DockerでNGINX(Webサーバ)を動かす
https://hub.docker.com/_/nginx

## 1. イメージを取得 / 確認 / 削除
### 1.1. Docker Hub で NGINXのイメージを探す
https://hub.docker.com/ のページを開く
（Googleで検索：「dockerhub」）

DockerHubで、「nginx」を検索する。
「OFFICIAL IMAG」と書いているものを開く。

または、以下で確認できる
```
docker search --filter is-official=true nginx
```

### 1.2. NIGNXのイメージをレジストリから取得
```
docker pull nginx
docker pull nginx:1.18.0-alpine
```
「:」のあとにタグを指定できる。
（無指定の場合はlatestになる）

### 1.3. 取得したイメージを確認
```
docker image ls
```

### 1.4. 取得したイメージを削除
```
docker image rm nginx
docker image rm nginx:1.18.0-alpine
```


## 2. イメージからコンテナを作成 / 起動 / 停止 / 削除
### 2.1. コンテナの作成
指定したイメージからコンテナを作成する
```
docker create nginx
```
イメージはタグの指定も可能
(例 nginx:1.18.0-alpine)

createで作成できるが起動はされない

```
docker create --name web-server nginx
```
コンテナに名前をつけることができる
(指定がない場合は、テキトウな名前がつけられる)

### 2.2. コンテナの確認
```
docker ps
```
起動中のコンテナが確認できる

```
docker ps -a
```
-a(--all) すべてのコンテナを表示

以下でコンテナの正確なステータスを確認できる
```
docker inspect --format '{{ .State.Status }}' web-server
```


### 2.3. コンテナを起動
```
docker start web-server
```
指定した名前、もしくはコンテナIDを指定して起動できる


### 2.4. コンテナを停止
```
docker stop web-server
```
指定した名前、もしくはコンテナIDを指定して停止できる


### 2.5. コンテナを削除
```
docker rm web-server
```
指定した名前、もしくはコンテナIDを指定して削除できる
(--force をつけると起動したコンテナを削除することもできる)


以下を実行すると一括削除できる
```
docker ps -a -q | xargs docker rm
```


### 2.6. NGINXで作成されたWebページを確認する方法
コンテナは起動されていても外部に公開されていない状態になっている。
コンテナにアクセスできるようにするには、
コンテナのポートをホスト側のポートに割当する必要がある。
```
docker create --name web-server -p 8080:80 nginx
```
-p (--publish) コンテナのポートをホストに公開
 (ホストのポート:コンテナのポート)

docker start したあとに
0.0.0.0:8080(localhost:8080) へアクセスすると、
NGINXが返すWebページが表示できる


### 2.7. コンテナの作成(create) & 起動(start) のショートカット
runを実行すると作成と起動が一気にできる
```
docker run nginx
docker run --name some-nginx -p 8080:80 -d --rm nginx
```
* --name コンテナの名前を指定
* -p (--publish) コンテナのポートをホストに公開 (ホスト側のポート:コンテナのポート)
* -d (--detach) バックグラウンドで起動
* --rm exitedのステータスになったら自動的に削除する

-dをつけない場合は、フォアグラウンドで動くので
停止したい場合は、 `Ctrl + C` を押す。
(--rmをつけていると停止後すぐに削除される)


## 3. オリジナルのイメージを作成してコンテナを起動してみる
https://hub.docker.com/_/nginx を参考にイメージを作る

### 3.1. コンテナが参照するファイル、ディレクトリを作成
1 .適当なところにディレクトリを作成する
```
mkdir -p ~/work/nginx/
cd ~/work/nginx/
```

2. コンテナで参照するディレクトリ,ファイルを作成
```
mkdir static-html-directory
touch static-html-directory/index.html
```

### 3.2. Dockerfileを作成する
4.1 で作成したディレクトリ直下に `Dockerfile` を作成
```
FROM nginx
COPY static-html-directory /usr/share/nginx/html
```

### 3.3. イメージを作成
イメージを作成するためにはbuildコマンドを利用できる
```
docker build -t my-nginx .
```
-t (--tag) イメージ名:タグ をつける

```
docker image ls
```
で作成したイメージが確認できる

### 3.4. イメージからコンテナを起動
作成したイメージは、レジストリから取得したイメージと同様に起動できる
```
docker run --name web-server -p 8080:80 -d --rm my-nginx
```


## 4. コンテナのくわしい操作
### 4.1 コンテナの中でコマンドを操作する
コンテナがrunningのときにexecコマンドでコマンドを実行できる
```
docker exec -it web-server /bin/bash
docker exec -it web-server /bin/sh
docker exec -it web-server ls
```
※ -it の意味は結構むずいので、操作する上ではとりあえず丸暗記でも大丈夫です

-i (--interactive)  
接続されていない場合でもSTDINを開いたままにする
(入力を受け付ける状態になる)

-t (--tty)  
疑似TTY(pty)を割り当てする
(入力と出力をするためのものを模倣したものを割り当てる)


### 4.2 ディレクトリ・ファイルの共有
以下のように`-v (--volume)`オプションを使うと、
ローカルのファイルをコンテナ内の指定された場所からアクセス可能にする
```
docker run --name web-server -p 8080:80 -d -v $(pwd)/static-html-directory:/usr/share/nginx/html nginx
```
カレントディレクトリの `static-html-directory` ディレクトリが
コンテナ内の `/usr/share/nginx/html` に配置される

- コンテナからローカルのファイルを操作可能になる
- ローカルからコンテナ内で参照されるファイルを変更できる
　(イメージを作り直さずに、ファイルの更新が反映できる)


## 5. docker-compose を使ってかんたんに環境構築
docker-composeを使うと、
かんたんにdockerを使った構成を再現できる

https://github.com/masa0221/docker-web-server-sandbox  
docker-compose.ymlに構成が書いている
