# 変更内容を記録する方法に慣れる
変更内容を記録する方法 = コミット
<!-- TOC -->

- [ディレクトリ/ファイル作成](#%E3%83%87%E3%82%A3%E3%83%AC%E3%82%AF%E3%83%88%E3%83%AA%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E4%BD%9C%E6%88%90)
- [Gitのリポジトリ作成](#git%E3%81%AE%E3%83%AA%E3%83%9D%E3%82%B8%E3%83%88%E3%83%AA%E4%BD%9C%E6%88%90)
- [コミットする対象を決める](#%E3%82%B3%E3%83%9F%E3%83%83%E3%83%88%E3%81%99%E3%82%8B%E5%AF%BE%E8%B1%A1%E3%82%92%E6%B1%BA%E3%82%81%E3%82%8B)
- [コミットする](#%E3%82%B3%E3%83%9F%E3%83%83%E3%83%88%E3%81%99%E3%82%8B)
- [ファイルを修正する](#%E3%83%95%E3%82%A1%E3%82%A4%E3%83%AB%E3%82%92%E4%BF%AE%E6%AD%A3%E3%81%99%E3%82%8B)
- [修正前後で比較](#%E4%BF%AE%E6%AD%A3%E5%89%8D%E5%BE%8C%E3%81%A7%E6%AF%94%E8%BC%83)
- [状態確認/stagedへ](#%E7%8A%B6%E6%85%8B%E7%A2%BA%E8%AA%8Dstaged%E3%81%B8)
    - [stagedにする](#staged%E3%81%AB%E3%81%99%E3%82%8B)
    - [stagedから戻す](#staged%E3%81%8B%E3%82%89%E6%88%BB%E3%81%99)
- [コミット](#%E3%82%B3%E3%83%9F%E3%83%83%E3%83%88)
- [コミットログの確認](#%E3%82%B3%E3%83%9F%E3%83%83%E3%83%88%E3%83%AD%E3%82%B0%E3%81%AE%E7%A2%BA%E8%AA%8D)
- [補足資料： ショートカットを登録](#%E8%A3%9C%E8%B6%B3%E8%B3%87%E6%96%99-%E3%82%B7%E3%83%A7%E3%83%BC%E3%83%88%E3%82%AB%E3%83%83%E3%83%88%E3%82%92%E7%99%BB%E9%8C%B2)

<!-- /TOC -->


## ディレクトリ/ファイル作成
```
pwd
```

```
mkdir -p ~/work/git-practice
```

```
cd ~/work/git-practice
```

```
touch index.html
```

```
ls -la
```

## Gitのリポジトリ作成
```
git init
```
(.gitができる)

```
ls -la
```

## コミットする対象を決める
```
git add --all
```

## コミットする
```
git commit
```
(Initial commit)

## ファイルを修正する
```
vi index.html
```

## 修正前後で比較
```
git diff
```

## 状態確認/stagedへ
git status
git status --short

### stagedにする
```
git add index.html
```

### stagedから戻す
```
git restore --staged index.html
```

## コミット
```
git commit -m “index.htmlの実装”
```


## コミットログの確認
```
git log
```


## 補足資料： ショートカットを登録
```sh
git config --get alias.st
git config --global alias.st 'status --short'
git config --global --unset alias.st
git config --list
```
