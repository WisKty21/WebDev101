# JavaScript基礎
<!-- TOC -->

- [変数](#%E5%A4%89%E6%95%B0)
- [変数の種類](#%E5%A4%89%E6%95%B0%E3%81%AE%E7%A8%AE%E9%A1%9E)
- [配列](#%E9%85%8D%E5%88%97)
- [オブジェクト](#%E3%82%AA%E3%83%96%E3%82%B8%E3%82%A7%E3%82%AF%E3%83%88)
- [関数](#%E9%96%A2%E6%95%B0)
- [条件分岐](#%E6%9D%A1%E4%BB%B6%E5%88%86%E5%B2%90)

<!-- /TOC -->


## 変数
値を入れる箱のことを変数と呼ぶ

```js
// 後から入れ替えることができる変数
let someValue = '後から再度更新可能';
someValue = '更新したい値'; // できる
```

```js
// 後から入れ替えることができる変数
const someValue = '変更は許さない！';
someValue = 'エラーになる'; // エラーになります
```

## 変数の種類
- String: 文字列 (シングルクオートで囲む)
- Number: 数値
- Boolean: true か false (真偽値 = 「はい」か「いいえ」)

※ 他にもたくさんあります  
https://developer.mozilla.org/ja/docs/Web/JavaScript/Data_structures

## 配列
```js
let arr = ['a', 'b', 'c'];
```
`[` と `]` で囲んで、カンマ区切りで値を並べたもの

```js
let arr = ['a', 'b', 'c'];
arr.forEach((value) => console.log(value));
```
`forEach`というメソッドを使って配列を一つずつ扱うことができる


## オブジェクト
```js
let obj = {
    key1: 'value1',
    key2: 'value2',
    key3: 'value3',
};

console.log(obj.key1);    // value1 が出力される
console.log(obj['key1']); // [] で指定もできる
```
`{` と `}` で囲んで、カンマ区切りで値を並べたもの  


階層が深い例：
```js
const human = {
    name: {
        first_name: '太郎',
        last_name: '山田',
    },
    age: 28,
    sex: 'male',
    hobby: 'fishing',
};

console.log(human.name.first_name);       // 太郎 が出力される
console.log(human['name']['first_name']); // 太郎 が出力される
```

## 関数 
簡単に言うと処理をまとめたもの。
```js
function plus(value1, value2) {
    return value1 + value2;
}

console.log(plus(1, 2)); // 3を出力
console.log(plus(3, 5)); // 8を出力
```

関数を変数に入れることもできる
```js
let minus = function (value1, value2) {
    return value1 - value2;
};

console.log(minus(8, 3)); // 5を出力
console.log(minus(5, 2)); // 3を出力
```

BMIを計算する関数 ( `**` は、べき乗 = height * height です )
```js
function calculateBmi(height, weight) {
    return weight / (height ** 2);
}
```


## 条件分岐
`if`を使うことで、状況に応じて処理を分岐させることができる

```js
// boolean型(true/false)で指定する必要がある
let condition = true;
if (condition) {
    // trueの場合
} else {
    // falseの場合
}
```

例1: 文字の一致を比較
```js
// AとBは一致するか判定
if ('A' === 'B') {
    // trueの場合
    alert('AとBは同じです（ちょっと何言ってるかわからないですね）');
} else {
    // falseの場合
    alert('AとBは違います');
}
```
※ `==` を使うと `'1' ==  1` も`true`になってしまいます  
※ 特に理由がない場合は `===` を使うと覚えておきましょう  
https://developer.mozilla.org/ja/docs/Web/JavaScript/Reference/Operators#equality_operators

例2: 数値の比較(+変数の中身を比較)
```js
// AとBは一致するか判定
let value1 = 33;
let value2 = 15;
if (value1 <= value2) {
    // trueの場合
    alert('value1は、value2と等しいか小さい');
} else {
    // falseの場合
    alert('value1は、value2より大きい');
}
```
※ `=>`は利用できません。大なりイコールの場合は`>=`を使います
https://developer.mozilla.org/ja/docs/Web/JavaScript/Reference/Operators#relational_operators
