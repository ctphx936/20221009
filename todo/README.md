# アプリケーション名
Todo管理アプリ

![picture 1](images/3144e2a7fb3c9366eaf9c44686adafa83654f07ce4c245be1d06031b11247793.png)  


## 作成した目的
日々のタスク管理

## 機能一覧
・ユーザーログイン
・ユーザー登録
・ユーザーログアウト

・Todo一覧表示

・Todo作成

・Todo更新

・Todo削除

・Todo検索

・タグ選択


## 使用技術（実行環境）
Laravel　8.83.24

## テーブル設計

テーブル名：
Todos
カラム：
id
user_id
tag_id
content
create_at
update_at

テーブル名：
users
カラム：
id
name
email
password
create_at
update_at

テーブル名：
tags
カラム：
id
tagname
create_at
update_at
	

## ER図

![picture 2](images/f2cf7a4a7b3cb17a64c2ed5e49fcad7a536e9cee278d3f561430414958254456.png)  




## 他に記載することがあれば記述する
