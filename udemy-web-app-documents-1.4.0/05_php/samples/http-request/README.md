# GET / POST のHTTPリクエストサンプルについて
ここでは、もっと詳しく知りたい方のために、HTTPのリクエストについてまとめたものを書いておきます。  
少し難しいかもしれませんので、HTTPリクエストというのが具体的にどういうものか見てみたいときに確認してみてください。  
この中で利用している`nc`コマンドの使い方を知らなくてもWebアプリは作れますので安心してください😄

## リクエストを実行する前の準備
以下で、HTTPリクエストをlocalhostのポート8080でListenできるようにしておいてください。
```
php -S localhost:8080
```

## ncコマンドを使ってHTTPのリクエストを送信する
ncコマンドを使うとブラウザで普段何気なく送信しているリクエストを自分の手で実行できます。  


## GETのHTTPリクエストを手動で実行する
```
nc localhost 8080 < requestHttpGet.txt
```

実行結果
```
$ nc localhost 8080 < requestHttpGet.txt
HTTP/1.1 200 OK
Host: localhost:8080
Date: Tue, 04 May 2021 00:27:10 GMT
Connection: close
X-Powered-By: PHP/7.3.24-(to be removed in future macOS)
Content-type: text/html; charset=UTF-8

<!DOCTYPE html>
<html lang="ja">
<head>
...以下省略
```

## POSTのHTTPリクエストを手動で実行する
```
nc localhost 8080 < requestHttpPost.txt
```

実行結果
```
$ nc localhost 8080 < requestHttpPost.txt
HTTP/1.1 200 OK
Host: localhost:8080
Date: Tue, 04 May 2021 00:24:48 GMT
Connection: close
X-Powered-By: PHP/7.3.24-(to be removed in future macOS)
Content-type: text/html; charset=UTF-8

{"result":false,"correctAnswer":"B","correctAnswerValue":"HyperTextMarkupLanguage","explanation":"\u3053\u308c\u304c\u9593\u9055\u3048\u3066\u305f\u3089\u300cHTML\u3068\u306f\uff1f\u300d\u306e\u52d5\u753b\u3092\u5fa9\u7fd2\u304a\u9858\u3044\u3057\u307e\u3059\uff01"}% 
```