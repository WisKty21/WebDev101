# EC2にNGINXをインストール

<!-- TOC -->

- [amazon-linux-extrasでnginxをインストールできるようにする](#amazon-linux-extras%E3%81%A7nginx%E3%82%92%E3%82%A4%E3%83%B3%E3%82%B9%E3%83%88%E3%83%BC%E3%83%AB%E3%81%A7%E3%81%8D%E3%82%8B%E3%82%88%E3%81%86%E3%81%AB%E3%81%99%E3%82%8B)
- [yumでnginxをインストール](#yum%E3%81%A7nginx%E3%82%92%E3%82%A4%E3%83%B3%E3%82%B9%E3%83%88%E3%83%BC%E3%83%AB)
- [systemctlでnginxを操作](#systemctl%E3%81%A7nginx%E3%82%92%E6%93%8D%E4%BD%9C)
    - [起動](#%E8%B5%B7%E5%8B%95)
    - [停止](#%E5%81%9C%E6%AD%A2)
    - [再起動](#%E5%86%8D%E8%B5%B7%E5%8B%95)
    - [自動起動を有効にする](#%E8%87%AA%E5%8B%95%E8%B5%B7%E5%8B%95%E3%82%92%E6%9C%89%E5%8A%B9%E3%81%AB%E3%81%99%E3%82%8B)
- [ドキュメントルートにファイルを設置する](#%E3%83%89%E3%82%AD%E3%83%A5%E3%83%A1%E3%83%B3%E3%83%88%E3%83%AB%E3%83%BC%E3%83%88%E3%81%AB%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%82%92%E8%A8%AD%E7%BD%AE%E3%81%99%E3%82%8B)
- [参考資料](#%E5%8F%82%E8%80%83%E8%B3%87%E6%96%99)

<!-- /TOC -->

## amazon-linux-extrasでnginxをインストールできるようにする

```
sudo amazon-linux-extras enable nginx1
```

## yumでnginxをインストール
```
yum clean metadata
sudo yum install nginx -y
```


## systemctlでnginxを操作

### 起動
```
sudo systemctl start nginx.service
```

### 停止
```
sudo systemctl stop nginx.service
```

### 再起動
*confファイルを修正した後は再起動をして反映點せましょう。

```
sudo systemctl restart nginx.service
```

### 自動起動を有効にする
以下を実行しておけばEC2起動時に自動でnginxが起動されます
```
sudo systemctl enable nginx.service
```


## ドキュメントルートにファイルを設置する
`/usr/share/nginx/html/`以下にファイルを配置する場合は以下のようにします。
```
sudo mv [ファイルのパス] /usr/share/nginx/html/
```
※`/usr/share/nginx/html/`がnginxのデフォルトのドキュメントルートです（変更可能）  


例: `~/index.html` を移動する場合
```
sudo mv ~/index.html /usr/share/nginx/html/
```


例: `~/html/` 以下のすべてのファイルを移動する場合
```
sudo mv ~/html/* /usr/share/nginx/html/
```

## 参考資料

Amazon Linux 2 EC2 インスタンスに Extras Library からソフトウェアをインストールする  
https://aws.amazon.com/jp/premiumsupport/knowledge-center/ec2-install-extras-library-software/