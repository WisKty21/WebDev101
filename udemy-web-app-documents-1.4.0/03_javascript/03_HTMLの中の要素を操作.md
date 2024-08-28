# HTMLの中の要素を操作
<!-- TOC -->

- [JavaScriptファイルの読み込みタイミングを変更する](#javascript%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%81%AE%E8%AA%AD%E3%81%BF%E8%BE%BC%E3%81%BF%E3%82%BF%E3%82%A4%E3%83%9F%E3%83%B3%E3%82%B0%E3%82%92%E5%A4%89%E6%9B%B4%E3%81%99%E3%82%8B)
    - [deferの指定がある場合](#defer%E3%81%AE%E6%8C%87%E5%AE%9A%E3%81%8C%E3%81%82%E3%82%8B%E5%A0%B4%E5%90%88)
    - [deferの指定がない場合](#defer%E3%81%AE%E6%8C%87%E5%AE%9A%E3%81%8C%E3%81%AA%E3%81%84%E5%A0%B4%E5%90%88)
    - [DOMとは?](#dom%E3%81%A8%E3%81%AF)
- [要素を取得する（セレクタで指定した要素を取得）](#%E8%A6%81%E7%B4%A0%E3%82%92%E5%8F%96%E5%BE%97%E3%81%99%E3%82%8B%E3%82%BB%E3%83%AC%E3%82%AF%E3%82%BF%E3%81%A7%E6%8C%87%E5%AE%9A%E3%81%97%E3%81%9F%E8%A6%81%E7%B4%A0%E3%82%92%E5%8F%96%E5%BE%97)
    - [要素を一つだけ取得](#%E8%A6%81%E7%B4%A0%E3%82%92%E4%B8%80%E3%81%A4%E3%81%A0%E3%81%91%E5%8F%96%E5%BE%97)
    - [複数の要素を取得](#%E8%A4%87%E6%95%B0%E3%81%AE%E8%A6%81%E7%B4%A0%E3%82%92%E5%8F%96%E5%BE%97)
- [要素についたデータを取得](#%E8%A6%81%E7%B4%A0%E3%81%AB%E3%81%A4%E3%81%84%E3%81%9F%E3%83%87%E3%83%BC%E3%82%BF%E3%82%92%E5%8F%96%E5%BE%97)
- [要素のスタイルを変更](#%E8%A6%81%E7%B4%A0%E3%81%AE%E3%82%B9%E3%82%BF%E3%82%A4%E3%83%AB%E3%82%92%E5%A4%89%E6%9B%B4)
- [要素にクリックイベントを設定する](#%E8%A6%81%E7%B4%A0%E3%81%AB%E3%82%AF%E3%83%AA%E3%83%83%E3%82%AF%E3%82%A4%E3%83%99%E3%83%B3%E3%83%88%E3%82%92%E8%A8%AD%E5%AE%9A%E3%81%99%E3%82%8B)

<!-- /TOC -->

## JavaScriptファイルの読み込みタイミングを変更する
HTMLの構造をブラウザが解釈した後でないと、HTMLの要素をJavaScriptで操作することはできない。

JavaScriptファイルを読み込むタイミングを変更する方法:
```html
<script src="javascript.js" defer></script>
```
`defer`という属性を追加すると、  
HTMLの構造をブラウザがすべて読みこんだ後でJavaScriptが読み込まれ、  
jsファイルの中に記述しているJavaScriptが実行される

### `defer`の指定がある場合
1. ブラウザがHTMLをサーバーから受け取る
2. ブラウザがHTMLの構造を解析して、DOMを構築する
3. `<script>`で指定したjsファイルが読み込まれる
4. jsファイルの中でHTMLの要素を操作 <-- コレはDOMがあるためJavaScriptで要素の操作が可能

### `defer`の指定がない場合
1. ブラウザがHTMLをサーバーから受け取る
2. ブラウザがHTMLの構造を解析して途中に見つかった`<script>`タグのjsファイルを読み込む
3. jsファイルの中でHTMLの要素を操作 <-- ここではDOMがないので操作できない
4. ブラウザがHTMLの構造を解析して、DOMを構築する

### DOMとは?
- DOMとはDocumentObjectModelの略
- HTMLのテキストを構造化されたデータにしたもの
- DOMには要素の情報も含まれていて、それらを操作することでブラウザで表示されている内容を変更できる
- JavaScriptはDOMを操作することができるプログラミング言語の一つ

## 要素を取得する（セレクタで指定した要素を取得）
CSSと同じセレクタを指定して、HTMLの要素を操作することができる。

### 要素を一つだけ取得
`document.querySelector`を使うと一致した要素のうち最初の一つだけを取得できる。

```html
<ol>
    <li>リスト1</li> <!-- このliだけ取れる -->
    <li>リスト2</li>
    <li>リスト3</li>
</ol>
```

```js
document.querySelector('li'); // li が取得できる
```

### 複数の要素を取得
`document.querySelectorAll`を使うと一致した要素すべてが取得できる。

```html
<ol>
    <li>リスト1</li> <!-- このliだけ取れる -->
    <li>リスト2</li>
    <li>リスト3</li>
</ol>
```

```js
document.querySelectorAll('li'); // [li, li, li] の配列が取得できる
```
※配列の操作は [配列](#%E9%85%8D%E5%88%97) を参照

## 要素についたデータを取得
```html
<ol>
    <li data-id="123" data-hoge="fuga">リスト1</li>
</ol>
```

```js
let li = document.querySelector('li');
console.log(li.dataset.id); // 123 (data-idの値)が取得できる
console.log(li.dataset.hoge); // fuga (data-hogeの値)が取得できる
console.log(li.innerHTML); // リスト1 (<li>タグで囲まれた中身)が取得できる
```

## 要素のスタイルを変更
```html
<p>ぱらぐらふ</p>
```

```js
document.querySelector('p').style.color = 'red';
```
`style`の後の`color`等はcssのプロパティと対応している。  


例: 
```css
p {
    background-color: #e5ecfc;
    font-weight: bold;
}
```
↓JavaScriptで書くと以下になる
```js
let p = document.querySelector('p');
p.style.backgroundColor = '#e5ecfc'; // background-color -> backgroundColor
p.style.fontWeight = 'bold'; // font-weight -> fontWeight
```

※ ハイフンが消えて、ハイフンの後の単語の先頭が大文字になる、というルール  
（単語の頭が大文字になる書き方をキャメルケースといいます）

## 要素にクリックイベントを設定する
- JavaScriptではイベントが発生したタイミングで追加の処理を動かすことができる
- イベントの例
  - クリックしたとき
  - マウスオーバーしたとき
  - 要素の内容が変わったとき
  - など

かんたんな例
```html
<button id="btn">ボタン</button>
```

```js
// ボタンの要素を取得
let button = document.querySelector('button#btn');
let clickEvent = function (event) {
    // イベント発生時の処理

    // イベントのもとになったボタンの要素を取得
    let button = event.target;
};
// クリックしたときに実行される処理を設定
button.addEventListener('click', clickEvent);
```
