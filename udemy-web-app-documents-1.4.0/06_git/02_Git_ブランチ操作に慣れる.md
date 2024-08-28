# ブランチ操作に慣れる
<!-- TOC -->

- [現在のブランチを確認](#%E7%8F%BE%E5%9C%A8%E3%81%AE%E3%83%96%E3%83%A9%E3%83%B3%E3%83%81%E3%82%92%E7%A2%BA%E8%AA%8D)
    - [branch名変更](#branch%E5%90%8D%E5%A4%89%E6%9B%B4)
- [ブランチを作成する](#%E3%83%96%E3%83%A9%E3%83%B3%E3%83%81%E3%82%92%E4%BD%9C%E6%88%90%E3%81%99%E3%82%8B)
    - [確認](#%E7%A2%BA%E8%AA%8D)
- [ブランチを切り替え](#%E3%83%96%E3%83%A9%E3%83%B3%E3%83%81%E3%82%92%E5%88%87%E3%82%8A%E6%9B%BF%E3%81%88)
    - [ブランチ作成と切替を一発で行う方法](#%E3%83%96%E3%83%A9%E3%83%B3%E3%83%81%E4%BD%9C%E6%88%90%E3%81%A8%E5%88%87%E6%9B%BF%E3%82%92%E4%B8%80%E7%99%BA%E3%81%A7%E8%A1%8C%E3%81%86%E6%96%B9%E6%B3%95)
- [page1.html作成&コミット](#page1html%E4%BD%9C%E6%88%90%E3%82%B3%E3%83%9F%E3%83%83%E3%83%88)
- [差分を確認](#%E5%B7%AE%E5%88%86%E3%82%92%E7%A2%BA%E8%AA%8D)
- [mainに取り込み](#main%E3%81%AB%E5%8F%96%E3%82%8A%E8%BE%BC%E3%81%BF)
- [マージ済のブランチを削除](#%E3%83%9E%E3%83%BC%E3%82%B8%E6%B8%88%E3%81%AE%E3%83%96%E3%83%A9%E3%83%B3%E3%83%81%E3%82%92%E5%89%8A%E9%99%A4)

<!-- /TOC -->

## 現在のブランチを確認
```
git branch
```

### branch名変更
```
git branch -m main
```


## ブランチを作成する
```
git branch add-page main
```

### 確認
```
git branch
```


## ブランチを切り替え
```
git switch add-page
```
(`git checkout add-page`と同じ意味)

### ブランチ作成と切替を一発で行う方法
```
git switch -c add-age main
```


## page1.html作成&コミット
```
touch page1.html
```
```
git add page1.html
```
```
git commit -m "page1を追加"
```


## 差分を確認
```
git diff main
```


## mainに取り込み
```
git switch main
```
```
git diff add-page
```

```
git merge add-page
```


## マージ済のブランチを削除
```
git branch -d add-page
```