# コンフリクト（衝突）を解消する
<!-- TOC -->

- [japaneseブランチを作成&修正](#japanese%E3%83%96%E3%83%A9%E3%83%B3%E3%83%81%E3%82%92%E4%BD%9C%E6%88%90%E4%BF%AE%E6%AD%A3)
- [englishブランチを作成&修正](#english%E3%83%96%E3%83%A9%E3%83%B3%E3%83%81%E3%82%92%E4%BD%9C%E6%88%90%E4%BF%AE%E6%AD%A3)
- [mainブランチへマージ](#main%E3%83%96%E3%83%A9%E3%83%B3%E3%83%81%E3%81%B8%E3%83%9E%E3%83%BC%E3%82%B8)
- [状態を確認](#%E7%8A%B6%E6%85%8B%E3%82%92%E7%A2%BA%E8%AA%8D)
- [コンフリクトを解決する](#%E3%82%B3%E3%83%B3%E3%83%95%E3%83%AA%E3%82%AF%E3%83%88%E3%82%92%E8%A7%A3%E6%B1%BA%E3%81%99%E3%82%8B)
    - [方法１: マージしない](#%E6%96%B9%E6%B3%95%EF%BC%91-%E3%83%9E%E3%83%BC%E3%82%B8%E3%81%97%E3%81%AA%E3%81%84)
    - [方法２: 内容を取り込んで解決](#%E6%96%B9%E6%B3%95%EF%BC%92-%E5%86%85%E5%AE%B9%E3%82%92%E5%8F%96%E3%82%8A%E8%BE%BC%E3%82%93%E3%81%A7%E8%A7%A3%E6%B1%BA)

<!-- /TOC -->


## japaneseブランチを作成&修正
```
git switch -c japanese main
```
```
vi index.html
```
```
git commit -am “index.htmlのコンテンツを日本語の挨拶に変更”
```

## englishブランチを作成&修正
```
git switch -c english main
```
```
vi index.html
```
```
git commit -am “index.htmlのコンテンツを英語の挨拶に変更”
```

## mainブランチへマージ
```
git switch main
```
```
git merge english
```
```
git merge japanese
```

## 状態を確認
```
git status
```

## コンフリクトを解決する
### 方法１: マージしない
```
git merge --abort
```

### 方法２: 内容を取り込んで解決
```
git merge japanese
```
```
vi index.html
```
```
git add index.html
```
```
git commit
```