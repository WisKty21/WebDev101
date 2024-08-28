# WebDev101
Udemy講座「0からわかるWebシステム開発」のコード

ssh -i ~/.ssh/test-server2.pem ec2-user@13.231.119.41

chmod 400 ~/.ssh/test-server2.pem

scp -i ~/.ssh/test-server2.pem ./upload.html ec2-user@13.231.119.41:~/

scp -i ~/.ssh/test-server2.pem ec2-user@13.231.119.41:~/download.html ./

man amazon-linux-extras

sudo amazon-linux-extras install nginx1

systemctl status nginx.service

sudo systemctl start nginx.service

sudo lsof -i:80

sudo systemctl stop nginx.service

sudo systemctl enable nginx.service

cat /etc/nginx/nginx.conf

ls /usr/share/nginx/html

1. ドキュメントルートになる　/var/www/html を作成

sudo mkdir -p /var/www/html
これが1.

ls /var/www/

UNIX FHS　で検索→wwwの正体がわかる

2. NGINXの設定ファイル(nginx.conf)のrootを修正

scp -i ~/.ssh/test-server2.pem ec2-user@13.231.119.41:/etc/nginx/nginx.conf ./
ここで、2. NGINXの設定ファイル(nginx.conf)のrootを修正 

scp -i ~/.ssh/test-server2.pem ./nginx.conf ec2-user@13.231.119.41:~/

sudo cp /etc/nginx/nginx.conf /etc/nginx/nginx.conf.backup

sudo mv ./nginx.conf /etc/nginx/nginx.conf
これで設定書き換え

sudo systemctl restart nginx.service

sudo systemctl status nginx.service -l

url→404

3. 動作確認

echo "hell nginx" > index.html
cat index.html
ls /var/www/html

scp -r -i ~/.ssh/test-server2.pem ./quiz-app ec2-user@13.231.119.41:~/
ls ./quiz-app/*html
ls ./quiz-app/*
sudo mv ./quiz-app/* /var/www/html

## PHP

