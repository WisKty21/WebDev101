# EC2の操作

<!-- TOC -->

- [amazon-linux-extrasでphpをインストールできるようにする](#amazon-linux-extras%E3%81%A7php%E3%82%92%E3%82%A4%E3%83%B3%E3%82%B9%E3%83%88%E3%83%BC%E3%83%AB%E3%81%A7%E3%81%8D%E3%82%8B%E3%82%88%E3%81%86%E3%81%AB%E3%81%99%E3%82%8B)
- [yumでnginxをインストール](#yum%E3%81%A7nginx%E3%82%92%E3%82%A4%E3%83%B3%E3%82%B9%E3%83%88%E3%83%BC%E3%83%AB)
- [systemctlでphp-fpmを操作](#systemctl%E3%81%A7php-fpm%E3%82%92%E6%93%8D%E4%BD%9C)
    - [起動](#%E8%B5%B7%E5%8B%95)
    - [停止](#%E5%81%9C%E6%AD%A2)
    - [再起動](#%E5%86%8D%E8%B5%B7%E5%8B%95)
    - [自動起動を有効にする](#%E8%87%AA%E5%8B%95%E8%B5%B7%E5%8B%95%E3%82%92%E6%9C%89%E5%8A%B9%E3%81%AB%E3%81%99%E3%82%8B)
- [NGINXでのPHPの設定](#nginx%E3%81%A7%E3%81%AEphp%E3%81%AE%E8%A8%AD%E5%AE%9A)
    - [nginxの設定を変更](#nginx%E3%81%AE%E8%A8%AD%E5%AE%9A%E3%82%92%E5%A4%89%E6%9B%B4)
    - [変更した設定を反映](#%E5%A4%89%E6%9B%B4%E3%81%97%E3%81%9F%E8%A8%AD%E5%AE%9A%E3%82%92%E5%8F%8D%E6%98%A0)
- [参考](#%E5%8F%82%E8%80%83)
    - [ファイルアップロード〜ドキュメントルート配置まで](#%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%82%A2%E3%83%83%E3%83%97%E3%83%AD%E3%83%BC%E3%83%89%E3%80%9C%E3%83%89%E3%82%AD%E3%83%A5%E3%83%A1%E3%83%B3%E3%83%88%E3%83%AB%E3%83%BC%E3%83%88%E9%85%8D%E7%BD%AE%E3%81%BE%E3%81%A7)
    - [資料](#%E8%B3%87%E6%96%99)

<!-- /TOC -->


## amazon-linux-extrasでphpをインストールできるようにする

```
sudo amazon-linux-extras enable php7.4
```

## yumでnginxをインストール
```
yum clean metadata
sudo yum install php-cli php-pdo php-fpm php-json php-mysqlnd -y
```
yum パッケージ管理のためのコマンドです。  
ソフトウェアをかんたんにインストール、アンインストールなど行うことができます。  

## systemctlでphp-fpmを操作

### 起動
```
sudo systemctl start php-fpm.service
```

### 停止
```
sudo systemctl stop php-fpm.service
```

### 再起動
*confファイルを修正した後は再起動をして設定を反映させましょう。
```
sudo systemctl restart php-fpm.service
```

### 自動起動を有効にする
以下を実行しておけばEC2起動時に自動でphp-fpmが起動されます
```
sudo systemctl enable php-fpm.service
```


## NGINXでのPHPの設定
### nginxの設定を変更
```
sudo vim /etc/nginx/default.d/php.conf
```
`/etc/nginx/default.d/php.conf`を修正します


`fastcgi_intercept_errors`が`on`の場合は、PHPが404を返したときにnginxで設定している`error_page`のページが表示されます。  
今回は`off`にします
```nginx
fastcgi_intercept_errors on;
```
↓ 変更
```nginx
# fastcgi_intercept_errors on;
```
あるいは`on`を`off`にする





### 変更した設定を反映
```
sudo systemctl restart nginx.service
```


## 参考
### ファイルアップロード〜ドキュメントルート配置まで
参考にファイルアップロードからファイル配置までを行ったコマンドを書いておきます  
EC2のIPはAWSのコンソールにログインして確認してください(以下の例では123.123.123.123にしています)
```
scp -r -i ~/.ssh/test-server.pem ./html ./lib ./template ec2-user@123.123.123.123:~/
ssh -i ~/.ssh/test-server.pem ec2-user@123.123.123.123
sudo mv lib template /usr/share/nginx/
sudo mv html/* /usr/share/nginx/html/
```

### 資料
Amazon Linux 2 EC2 インスタンスに Extras Library からソフトウェアをインストールする  
https://aws.amazon.com/jp/premiumsupport/knowledge-center/ec2-install-extras-library-software/


Module ngx_http_fastcgi_module  
http://nginx.org/en/docs/http/ngx_http_fastcgi_module.html#fastcgi_intercept_errors