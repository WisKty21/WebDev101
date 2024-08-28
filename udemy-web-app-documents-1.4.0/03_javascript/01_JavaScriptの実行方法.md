# JavaScriptの実行方法
<!-- TOC -->

- [直接HTMLに記述する方法](#%E7%9B%B4%E6%8E%A5html%E3%81%AB%E8%A8%98%E8%BF%B0%E3%81%99%E3%82%8B%E6%96%B9%E6%B3%95)
- [別ファイルを読み込む方法](#%E5%88%A5%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%82%92%E8%AA%AD%E3%81%BF%E8%BE%BC%E3%82%80%E6%96%B9%E6%B3%95)
- [JavaScriptをChromeのデベロッパーツールで実行する](#javascript%E3%82%92chrome%E3%81%AE%E3%83%87%E3%83%99%E3%83%AD%E3%83%83%E3%83%91%E3%83%BC%E3%83%84%E3%83%BC%E3%83%AB%E3%81%A7%E5%AE%9F%E8%A1%8C%E3%81%99%E3%82%8B)

<!-- /TOC -->


## 直接HTMLに記述する方法
```html
<script>
    alert('Hello JavaScript!');
</script>
```

## 別ファイルを読み込む方法
```html
<script src="javascript.js"></script>
```
`script:src`とタイピングするとEmmetで記述できる

```js
alert('Hello JavaScript!');
```

## JavaScriptをChromeのデベロッパーツールで実行する
Chromeのデベロッパーツールを開いて、Consoleのタブを開くとブラウザ上で直接JavaScriptを実行できる

```js
alert('Hello JavaScript');
console.log('Hello JavaScript');
```
