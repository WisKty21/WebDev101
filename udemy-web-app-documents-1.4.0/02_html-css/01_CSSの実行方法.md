# CSSの実行方法

<!-- TOC -->

- [直接記述する方法](#%E7%9B%B4%E6%8E%A5%E8%A8%98%E8%BF%B0%E3%81%99%E3%82%8B%E6%96%B9%E6%B3%95)
- [別ファイルを読み込む方法](#%E5%88%A5%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%82%92%E8%AA%AD%E3%81%BF%E8%BE%BC%E3%82%80%E6%96%B9%E6%B3%95)

<!-- /TOC -->

## 直接記述する方法
```html
<style>
body {
    background: lightcyan;
}
</style>
```


## 別ファイルを読み込む方法
```html
<link rel="stylesheet" href="style.css">
```
`link:css`とタイピングするとEmmetで記述できる

style.css を作成
```css
body {
    background: lightcyan;
}
```
