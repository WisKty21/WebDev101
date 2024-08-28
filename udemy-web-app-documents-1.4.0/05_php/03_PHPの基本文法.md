# PHPの基本文法
このドキュメントでは、当コースで利用する基本文法のみを紹介しています。  
変数や配列の操作の基礎的な考え方はJavaScriptと同じですので割愛します。


このドキュメントに書いているもの以外にも様々な組み込みの関数があります。  
詳しくは、PHPのドキュメントがわかりやすいので参照してみてください。  

PHPのドキュメント  
https://www.php.net/manual/ja/

<!-- TOC -->

- [変数](#%E5%A4%89%E6%95%B0)
- [配列](#%E9%85%8D%E5%88%97)
- [連想配列](#%E9%80%A3%E6%83%B3%E9%85%8D%E5%88%97)
- [配列の操作](#%E9%85%8D%E5%88%97%E3%81%AE%E6%93%8D%E4%BD%9C)
    - [count:数を数える](#count%E6%95%B0%E3%82%92%E6%95%B0%E3%81%88%E3%82%8B)
    - [foreach:すべての配列を参照する](#foreach%E3%81%99%E3%81%B9%E3%81%A6%E3%81%AE%E9%85%8D%E5%88%97%E3%82%92%E5%8F%82%E7%85%A7%E3%81%99%E3%82%8B)
- [条件分岐](#%E6%9D%A1%E4%BB%B6%E5%88%86%E5%B2%90)
    - [ifと併用してよく利用する関数](#if%E3%81%A8%E4%BD%B5%E7%94%A8%E3%81%97%E3%81%A6%E3%82%88%E3%81%8F%E5%88%A9%E7%94%A8%E3%81%99%E3%82%8B%E9%96%A2%E6%95%B0)
        - [isset](#isset)
        - [empty](#empty)
        - [in_array](#in_array)
- [繰り返し（ループ）](#%E7%B9%B0%E3%82%8A%E8%BF%94%E3%81%97%E3%83%AB%E3%83%BC%E3%83%97)
- [関数の定義](#%E9%96%A2%E6%95%B0%E3%81%AE%E5%AE%9A%E7%BE%A9)
- [変数の出力](#%E5%A4%89%E6%95%B0%E3%81%AE%E5%87%BA%E5%8A%9B)

<!-- /TOC -->

## 変数
PHPの場合は、変数の名前の前に`$`が付きます。

boolean(真偽値)
```php
$isCorrectAnswer = true;
$isCorrectAnswer = false;
```

int(数値型)
```php
$questionNum = 1;
```

string(文字列型)
```php
$answer = 'A';
$explanation = 'Aはなんとかかんとかです。ちなみにexplanationとは解説という意味です。';
```

## 配列
0から順番にキーを

かんたんな例
```php
$answers = ['A', 'B' ,'C', 'D'];

echo $answers[0]; // Aを出力
echo $answers[3]; // Cを出力
```

配列に値を追加する例
```php
$arr = []; // 空の配列を定義
$arr[] = '値1';
$arr[] = '値2';
$arr[] = '値3';
$arr[] = '値4';

echo $arr[0]; // 「値1」を出力
echo $arr[3]; // 「値4」を出力
```

## 連想配列
構造化された配列を作ることができます。

```php
$human = [
    'name' => [
        'first_name' => 'taro',
        'last_name' => 'yamada',
    ],
    'age' => 30,
    '座右の銘' => '虚仮の一念岩をも通す', // 日本語のキーもOK
];

echo $human['name']['first_name']; // 「taro」を出力
echo $human['age'];                // 「30」を出力
echo $human['座右の銘'];            // 「虚仮の一念岩をも通す」を出力
```

## 配列の操作
配列を操作するためにいろんなPHP組み込みの関数が用意されています

### count:数を数える

```php
$fruitsList = ['apple', 'orange', 'grape'];

echo '果物の数: '.count($fruitsList);
```

### foreach:すべての配列を参照する
```php
$fruitsList = ['apple', 'orange', 'grape'];

// キーを参照しない場合
foreach ($fruitsList as $fruits) {
    echo '果物: '.$fruits."\n";
}

// キーを参照したい場合
foreach ($fruitsList as $index => $fruits) {
    echo '番号: '.$index."\n";
    echo '果物: '.$fruits."\n\n";
}
```

`endforeach`を使った例
```php
foreach ($fruitsList as $fruits):
    echo '果物: '.$fruits."\n";
endforeach;
```
※`foreach`の行の最後の文字は `{` ではなく `:` に変わります。

## 条件分岐

基本的には以下の文法です。
```php
// ifのみ
if ([条件 true / false]) {
    // trueのとき実行
}

// if / else を使った場合
if ([条件 true / false]) {
    // trueのとき実行
} else {
    // falseのとき実行
}

// if / else if / else を使った場合
if ([条件1 true / false]) {
    // 条件1がtrueのとき実行
} else if ([条件2 true / false]) {
    // 条件2がtrueのとき実行
} else {
    // 条件1,条件2がfalseのとき実行
}
```


かんたんな例
```php
$isSunnyDay = true; // 晴れている
if ($isSunnyDay) {
    echo '「今日は晴れです。」';
}
```

きょうは会社を休む例
```php
$isHoliday         = false;  // 今日は休みではない=出勤日
$decideGoToAirport = true;   // 空港に行くことを決心する

if ($isHoliday) {
    echo '「...」';
} else if ($decideGoToAirport) {
    echo '「きょうは会社休みます。」';
} else {
    echo '「もう忘れましたから」';
}
```


数値型で0の場合、文字列が空の場合、配列で空配列の場合
```php
// ifではfalseと同じ扱いになる
$zeroInt = 0;
$emptyString = '';
$emptyArray = [];

if (!$zeroInt) {
    echo '$zeroIntの値は空です';
}
if (!$emptyString) {
    echo '$emptyStringの値は空です';
}
if (!$emptyArray) {
    echo '$emptyArrayの値は空です';
}
```
※`!`をつけると`true`が`false`、`false`が`true`になります(逆の意味になる)

### ifと併用してよく利用する関数
#### isset
`isset`は変数が定義されているかチェックする関数です。  
返り値はboolean型です。

```php
if (isset($hoge)) {
    echo '$hogeは定義されています';
} else {
    echo '$hogeは定義されていません';
}

$arr = [
    'key1' => 'value1',
];
if (!isset($arr['hoge'])) {
    echo '$arrの中にhogeのキーはありません';
}

// nullの場合はissetはfalseになる
$noValue = null;
if (!isset($noValue)) {
    echo '$noValueの中に値が指定されていません';
}
```


#### empty
`empty`は値が空かどうかチェックします。  
返り値はboolean型です。

```php
// 変数自体が未定義の場合
if (empty($hoge)) {
    echo '$hogeは値が入っていません';
}

// 変数が定義されていても値が空の場合
$fuga = '';
if (empty($fuga)) {
    echo '$fugaは値が入っていません';
}
```


#### in_array
`in_array`は配列の中に値があるか確認できる関数です。  
返り値はboolean型です。

```php
$answers = ['A', 'B', 'C', 'D'];
if (in_array('A', $answers)) {
    echo '配列$answersの中にAが見つかりました!';
}
```


## 繰り返し（ループ）
`while` を使うと何回も繰り返して処理を行うことができます。

基本的には以下の文法です。
```php
while ([ループするかしないか(true/false)]) {
    // 処理
}
```

例
```php
$cnt = 0;
while ($cnt < 10) {
    // 1回実行されると$cntが一つずつ増える
    $cnt = $cnt + 1;
    echo $cnt."回目\n";
}
```

## 関数の定義
JavaScriptと同様で関数の定義ができます

基本文法
```php
// 引数がない場合
function 関数名()
{
    // 処理を記入
}

// 引数がある場合
function 関数名(引数1, 引数2, ...)
{
    // 処理を記入
}
```

例
```php
function calculateBmi($height, $weight) {
    // BMI = 体重[kg] / (身長[m] * 身長[m])
    return $weight / ($height ** 2);
}

echo calculateBmi(1.65, 58); // 「21.303948576676」を出力
```

## 変数の出力
`var_dump` を利用すると変数の値を出力できます。

```php
$isBool = false;
var_dump($isBool);

$str = 'ほげほげ';
var_dump($str);

$number = 123;
var_dump($number);

$shiritori = [
    'apple',
    'english',
    'hour',
    'ruby',
    // 英語だとずっとしりとりできますね
];
var_dump($shiritori);
```

実行結果
```
php > $isBool = false;
php > var_dump($isBool);var_dump($isBool);
bool(false)

php > $str = 'ほげほげ';
php > var_dump($str);
string(12) "ほげほげ"

php > $number = 123;
php > var_dump($number);
int(123)

php > $shiritori = ['apple', 'english', 'hour', 'ruby'];
php > var_dump($shiritori);var_dump($shiritori);
array(4) {
  [0]=>
  string(5) "apple"
  [1]=>
  string(7) "english"
  [2]=>
  string(4) "hour"
  [3]=>
  string(4) "ruby"
}
```

困ったら色んな変数をvar_dumpで中身を見てみてください。
