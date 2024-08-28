# ファイル操作のサンプルプログラムについて

<!-- TOC -->

- [読み込みの実行](#%E8%AA%AD%E3%81%BF%E8%BE%BC%E3%81%BF%E3%81%AE%E5%AE%9F%E8%A1%8C)
- [書き込みの実行](#%E6%9B%B8%E3%81%8D%E8%BE%BC%E3%81%BF%E3%81%AE%E5%AE%9F%E8%A1%8C)

<!-- /TOC -->


## 読み込みの実行
```
php read_todo.php 
```

実行結果
```
$ php read_todo.php
array(4) {
  [0]=>
  string(2) "no"
  [1]=>
  string(4) "date"
  [2]=>
  string(6) "status"
  [3]=>
  string(4) "todo"
}
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


## 書き込みの実行

```
php write_todo.php 
```

実行前
```
$ cat todo_list.csv
no,date,status,todo
1,2021-05-02,done,HTML5を勉強する
2,2021-05-12,done,セレクタについて理解する
3,2021-05-22,yet,ブロック要素とインライン要素について理解する
4,2021-06-01,yet,domの操作について理解する
```

実行後
```
$ cat todo_list.csv
no,date,status,todo
1,2021-05-02,done,HTML5を勉強する
2,2021-05-12,done,セレクタについて理解する
3,2021-05-22,yet,ブロック要素とインライン要素について理解する
4,2021-06-01,yet,domの操作について理解する
5,2021-05-20,yet,PHPを理解する
```
`PHPを理解する`のTODOが追加されています