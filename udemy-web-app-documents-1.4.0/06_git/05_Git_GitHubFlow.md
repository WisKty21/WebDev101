# GitHub Flow
<!-- TOC -->

- [前提](#%E5%89%8D%E6%8F%90)
- [ローカルリポジトリのmainを最新に](#%E3%83%AD%E3%83%BC%E3%82%AB%E3%83%AB%E3%83%AA%E3%83%9D%E3%82%B8%E3%83%88%E3%83%AA%E3%81%AEmain%E3%82%92%E6%9C%80%E6%96%B0%E3%81%AB)
- [ローカルの作業ブランチ作成](#%E3%83%AD%E3%83%BC%E3%82%AB%E3%83%AB%E3%81%AE%E4%BD%9C%E6%A5%AD%E3%83%96%E3%83%A9%E3%83%B3%E3%83%81%E4%BD%9C%E6%88%90)
- [作業ブランチでコミット](#%E4%BD%9C%E6%A5%AD%E3%83%96%E3%83%A9%E3%83%B3%E3%83%81%E3%81%A7%E3%82%B3%E3%83%9F%E3%83%83%E3%83%88)
- [作業ブランチをリモートリポジトリに送信](#%E4%BD%9C%E6%A5%AD%E3%83%96%E3%83%A9%E3%83%B3%E3%83%81%E3%82%92%E3%83%AA%E3%83%A2%E3%83%BC%E3%83%88%E3%83%AA%E3%83%9D%E3%82%B8%E3%83%88%E3%83%AA%E3%81%AB%E9%80%81%E4%BF%A1)
- [GitHubでmainにマージ](#github%E3%81%A7main%E3%81%AB%E3%83%9E%E3%83%BC%E3%82%B8)
    - [PullRequestを作成](#pullrequest%E3%82%92%E4%BD%9C%E6%88%90)
    - [PullRequest確認](#pullrequest%E7%A2%BA%E8%AA%8D)
    - [PullRequestのマージ](#pullrequest%E3%81%AE%E3%83%9E%E3%83%BC%E3%82%B8)
- [ローカルリポジトリの更新](#%E3%83%AD%E3%83%BC%E3%82%AB%E3%83%AB%E3%83%AA%E3%83%9D%E3%82%B8%E3%83%88%E3%83%AA%E3%81%AE%E6%9B%B4%E6%96%B0)
    - [ローカルリポジトリを更新](#%E3%83%AD%E3%83%BC%E3%82%AB%E3%83%AB%E3%83%AA%E3%83%9D%E3%82%B8%E3%83%88%E3%83%AA%E3%82%92%E6%9B%B4%E6%96%B0)
    - [不要な作業ブランチを削除](#%E4%B8%8D%E8%A6%81%E3%81%AA%E4%BD%9C%E6%A5%AD%E3%83%96%E3%83%A9%E3%83%B3%E3%83%81%E3%82%92%E5%89%8A%E9%99%A4)

<!-- /TOC -->

## 前提
- ローカルとリモートにリポジトリ作成済
- リモートリポジトリはoriginに設定済
- 基本操作は理解している
    - push
    - pull
    - switch
    - commit

## ローカルリポジトリのmainを最新に
```
git pull
```
(`git fetch && git merge origin/main` と同じ)

## ローカルの作業ブランチ作成
```
git switch -c branch1
```

## 作業ブランチでコミット
```
git branch
```
```
vi index.html
```
```
git add --all
```
```
git commit -m “index.htmlにhogeを追加”
```

## 作業ブランチをリモートリポジトリに送信
```
git push origin branch1
```

## GitHubでmainにマージ

### PullRequestを作成
1. branch1を表示
2. PullRequestを作成
    - タイトル
    - 概要
        - Markdown表記
        - チェックボックス等も利用可

### PullRequest確認
1. 差分確認
2. コメント追記
3. PullRequestのステータス
    - Open
    - Closed
    - Merged

### PullRequestのマージ
- 「Merge pull request」を押す
- マージしたブランチ削除


## ローカルリポジトリの更新

### ローカルリポジトリを更新
```
git switch main
```
```
git pull
```
(1の作業と同じ)

### 不要な作業ブランチを削除
```
git branch -d branch1
```

...「ローカルリポジトリのmainを最新に」に戻る