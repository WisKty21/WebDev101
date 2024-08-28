# PHPでファイルの操作
PHPでは、外部のファイルを読み込んだり書き込んだりするなどの操作ができます。
ここでは、ファイルにまとめたクイズの問題一覧を読み込む処理を例に実装の解説をします。

<!-- TOC -->

- [CSVファイルとは？](#csv%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%81%A8%E3%81%AF)
    - [一緒に使いたいVSCodeの拡張機能](#%E4%B8%80%E7%B7%92%E3%81%AB%E4%BD%BF%E3%81%84%E3%81%9F%E3%81%84vscode%E3%81%AE%E6%8B%A1%E5%BC%B5%E6%A9%9F%E8%83%BD)
- [PHPでCSVファイルを読み込むときの流れ](#php%E3%81%A7csv%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%82%92%E8%AA%AD%E3%81%BF%E8%BE%BC%E3%82%80%E3%81%A8%E3%81%8D%E3%81%AE%E6%B5%81%E3%82%8C)
    - [ファイルを開く](#%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%82%92%E9%96%8B%E3%81%8F)
    - [ファイルからデータを取得する](#%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%81%8B%E3%82%89%E3%83%87%E3%83%BC%E3%82%BF%E3%82%92%E5%8F%96%E5%BE%97%E3%81%99%E3%82%8B)
        - [具体例](#%E5%85%B7%E4%BD%93%E4%BE%8B)
    - [ファイルを閉じる](#%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%82%92%E9%96%89%E3%81%98%E3%82%8B)
- [PHPでCSVファイルへ書き込む（追記する）ときの流れ](#php%E3%81%A7csv%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%81%B8%E6%9B%B8%E3%81%8D%E8%BE%BC%E3%82%80%E8%BF%BD%E8%A8%98%E3%81%99%E3%82%8B%E3%81%A8%E3%81%8D%E3%81%AE%E6%B5%81%E3%82%8C)
    - [ファイルを開く](#%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%82%92%E9%96%8B%E3%81%8F)
    - [ファイルへデータを書き込む](#%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%81%B8%E3%83%87%E3%83%BC%E3%82%BF%E3%82%92%E6%9B%B8%E3%81%8D%E8%BE%BC%E3%82%80)
    - [ファイルを閉じる](#%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%82%92%E9%96%89%E3%81%98%E3%82%8B)
- [サンプル](#%E3%82%B5%E3%83%B3%E3%83%97%E3%83%AB)
- [参考情報](#%E5%8F%82%E8%80%83%E6%83%85%E5%A0%B1)

<!-- /TOC -->


## CSVファイルとは？
PHPでファイルを操作する前にCSVファイルについて把握しておきましょう。

CSVとは「Comma Separated Value」のことで、カンマ(,)で区切られたデータが保存されているファイルの形式です。

```csv
no,date,status,todo
1,2021-05-02,done,HTML5を勉強する
2,2021-05-12,done,セレクタについて理解する
3,2021-05-22,yet,ブロック要素とインライン要素について理解する
4,2021-06-01,yet,domの操作について理解する
```
上記のようなデータは、以下のようになります

no |    date    | staus | todo
---|------------|-------|-------------------------------------
 1 | 2021-05-02 |  done | HTML5を勉強する
 2 | 2021-05-12 |  done | セレクタについて理解する
 3 | 2021-05-22 |   yet | ブロック要素とインライン要素について理解する
 4 | 2021-06-01 |   yet | domの操作について理解する


### 一緒に使いたいVSCodeの拡張機能
Edit csv  
https://marketplace.visualstudio.com/items?itemName=janisdd.vscode-edit-csv

コレを使うと、VSCodeの上でかんたんにCSVファイルを編集することができます。


## PHPでCSVファイルを読み込むときの流れ

### 1. ファイルを開く
```php
$handle = fopen('todo_list.csv', 'r');
```
- 第1引数:ファイルの場所
- 第2引数:ファイル操作のモードです

第2引数のモードは以下のページに具体的な種類が書いています  
https://www.php.net/manual/ja/function.fopen  
上記ドキュメントの「fopen() で使用可能な mode のリスト」の中に  
ファイルポインタという単語がありますが、2番のデータを取得するところで理解しましょう。

### 2. ファイルからデータを取得する
```php
fgetcsv($handle);
```
`fopen`で取得した`$handle`を指定して、データを1行取得します。

※1回目の実行で1行目が、2回目の実行で2行目が取得できます

#### 具体例
以下のCSVを読み込んだときの例
```csv
no,date,status,todo                                      <--- $row1
1,2021-05-02,done,HTML5を勉強する                          <--- $row2
2,2021-05-12,done,セレクタについて理解する                   <--- $row3
3,2021-05-22,yet,ブロック要素とインライン要素について理解する    <--- $row4
4,2021-06-01,yet,domの操作について理解する                   <--- $row5
```

```php
$row1 = fgetcsv($handle);
$row2 = fgetcsv($handle);
$row3 = fgetcsv($handle);
$row4 = fgetcsv($handle);
$row5 = fgetcsv($handle);
```
※実際にはこのような書き方は避けて、`while`を利用しましょう😅  
※このように1行ずつずれるのは**ファイルポインタ**というものが1行ずつずれるからです  
(fgetcsvを1回実行したら**ファイルポインタ**は1つ下に移動する)

上記の`$row3`には以下のようにデータが入っています
```
array(4) {
  [0]=>
  string(1) "2"
  [1]=>
  string(10) "2021-05-12"
  [2]=>
  string(4) "done"
  [3]=>
  string(36) "セレクタについて理解する"
}
```

### 3. ファイルを閉じる
```php
fclose($handle);
```
`fopen`で取得した`$handle`を使ってファイルを閉じます


## PHPでCSVファイルへ書き込む（追記する）ときの流れ
### 1. ファイルを開く
```php
$handle = fopen('todo_list.csv', 'a');
```
第2引数を`a`にするとファイルポインタが、ファイル内の最後の行になります


### 2. ファイルへデータを書き込む
```php
fputcsv($handle, $row);
```
`fopen`で取得した`$handle`を指定して、データを1行追記します。

例
```php
$row = [
  "5",
  "2021-05-20",
  "yet",
  "PHPを理解する",
];
fputcsv($handle, $row);
```

### 3. ファイルを閉じる
```php
fclose($handle);
```
`fopen`で取得した`$handle`を使ってファイルを閉じます


## サンプル
- [./samples/todo-list/README.md](./samples/todo-list/README.md) を見ながら実行してみてください

## 参考情報
- [fopen](https://www.php.net/manual/ja/function.fopen)
- [fgetcsv](https://www.php.net/manual/ja/function.fgetcsv)
- [fputcsv](https://www.php.net/manual/ja/function.fputcsv)
- [fclose](https://www.php.net/manual/ja/function.fclose)

