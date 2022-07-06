# RESE

![rese-1](https://user-images.githubusercontent.com/95161114/177024885-3dae3bcf-24a8-49a1-a83b-81fbd014dc47.gif)

## 1.URL
Herokuデプロイ_URL： https://aqueous-wildwood-93146.herokuapp.com/

## 2.概要
ある企業のグループ会社の飲食店予約サービス

## 3.制作背景・目的
外部の飲食店予約サービスは手数料を取られるので自社で予約サービスを持ちたい。

## 4.使用画面のイメージ

- 飲食店一覧ページ
<img width="1440" alt="rese home" src="https://user-images.githubusercontent.com/95161114/177025656-1b52973e-a061-49fe-ab21-3a42bdb9ae98.png">

- 会員登録ページ
<img width="1440" alt="rese registration" src="https://user-images.githubusercontent.com/95161114/177147848-bf680776-80b0-4846-a503-6acd41335b02.png">

- サンクスページ
<img width="1440" alt="rese thanks" src="https://user-images.githubusercontent.com/95161114/177025683-4578601e-4d06-4550-bede-dbf27a936554.png">

- ログインページ
<img width="1440" alt="rese login" src="https://user-images.githubusercontent.com/95161114/177025690-ae7d3685-0f4e-4dc5-91ac-464bfbc34b71.png">

- マイページ
<img width="1440" alt="rese mypage" src="https://user-images.githubusercontent.com/95161114/177025850-410c9988-2f31-4fd7-8eac-741bf8c26ff5.png">

- 飲食店詳細ページ
<img width="1440" alt="rese detail" src="https://user-images.githubusercontent.com/95161114/177025872-3b33a8ec-9a4b-464f-b909-5aa557299661.png">

- 予約完了ページ
<img width="1440" alt="rese done" src="https://user-images.githubusercontent.com/95161114/177025879-f6f97dac-2a3d-4de1-8df2-e84317cc54fb.png">

## 5.使用技術、バージョン
- フロントエンド
  - HTML / CSS
  - jQuery 3.5.1

- バックエンド
  - PHP 8.1.7
  - Laravel 8.83.12

- インフラ・その他
  - MySQL 5.7.34
  - Heroku
  - Visual Studio Code
  - draw.io

## 6.環境構築手順
1. Gitがインストールされていなければ、Gitをインストール
2. Herokuのアカウントがない場合、こちらから会員登録→https://signup.heroku.com/
3. Heroku CLIをインストール
  - macの場合：ターミナルで以下のコマンドを実行
```
$ brew tap heroku/brew && brew install heroku
```
  - Windowsの場合：https://devcenter.heroku.com/ja/articles/heroku-cli
    からインストーラをダウンロード
4. Githubからダウンロード
```
$ git clone https://github.com/jing-bay/rese.nihira.git
```
5. 上記のフォルダ内で下記のコマンドを実行
```
$ heroku login
```
6. Gitリポジトリを初期化
```
＄ git init
```
7. herokuコマンドでアプリケーション作成
```
＄ heroku create
```
8. laravel暗号化キーを設定
```
php artisan key:generate --show
```
上記で確認できたものをxxxxに入力する
```
heroku config:set APP_KEY=base64:xxxx
```
9. herokuへデプロイ
```
git add -A
git commit -m "message"
git push heroku main
```
10. Jawsdbをアドオンし、設定する
```
heroku addons:create jawsdb
$ heroku config | grep JAWSDB_URL
> JAWSDB_URL: mysql://<username>:<password>@<host>/<database>
heroku config:set DATABASE_URL='mysql2://<username>:<password>@<host>/<database>?reconnect=true'
```
11.マイグレーションする
```
$heroku run php artisan migrate
```
12.herokuを開く
```
$heroku open
```

## 7.機能一覧
- ユーザー登録関連
  - 会員登録
  - ログイン・ログアウト
- 飲食店表示関連
  - 飲食店一覧取得
  - 飲食店詳細取得
  - 飲食店検索機能（エリア・ジャンル・キーワード）
- マイページ関連
  - 飲食店お気に入り登録・削除
  - 飲食店予約情報追加・削除
  - 評価機能追加・削除
- マイページ関連
  - 飲食店お気に入り登録・削除
  - 飲食店予約情報追加・変更・削除
  - 評価機能追加・削除

## ８.工夫したところ
競合アプリケーションは機能や画面が複雑で使いづらいため、シンプルにした・

## 9.苦労した点
herokuへのマイグレーションがなかなかうまくいかないこと

## 10.DB設計
### ER図
![ER drawio](https://user-images.githubusercontent.com/95161114/177180255-e99cd710-aaf2-44d2-be44-a4a2641c85bc.png)

### テーブル設定
#### usersテーブル
ユーザーを管理する。

|  カラム名  |  属性  |  役割  |
| ---- | ---- | ---- |
|  id  |  unsigned bigint/PRIMARY KEY/NOT NULL | ユーザーを識別するID |
|  name  |  varchar(255)/NOT NULL | ユーザー名 |
|  email  |  varchar(255)/UNIQUE KEY/NOT NULL | メールアドレス |
|  email_verified_at  |  timestamp | メール認証用 |
|  password  |  varchar(255)/NOT NULL | パスワード |
|  remember_token  |  varchar(100) | ユーザーのトークンを格納するために使用 |
|  created_at  |  timestamp | 作成日時 |
|  updated_at  |  timestamp | 更新日時 |

#### shopsテーブル
飲食店情報を管理する。

|  カラム名  |  属性  |  役割  |
| ---- | ---- | ---- |
|  id  |  unsigned bigint/PRIMARY KEY/NOT NULL  |  飲食店を識別するID |
|  area_id  |  unsigned bigint/NOT NULL  |  地域を識別するID |
|  category_id  |  unsigned bigint/NOT NULL  |  ジャンルを識別するID |
|  name  |  varchar(255)/NOT NULL  |  店名 |
|  overview  |  text/NOT NULL  |  概要 |
|  url  |  varchar(255)/NOT NULL  |  お店のURL |
|  created_at  |  timestamp  |  作成日時 |
|  updated_at  |  timestamp  |  更新日時 |

#### areasテーブル
飲食店のエリアを管理する。
|  カラム名  |  属性  |  役割  |
| ---- | ---- | ---- |
| id  |  unsigned bigint/PRIMARY KEY/NOT NULL  |  エリアを識別するID  |
| name  |  varchar(255)/NOT NULL  |  エリアの名前  |
| created_at  |  timestamp  |  作成日時  |
| updated_at  |  timestamp  |  更新日時  |

#### categoriesテーブル
飲食店のジャンルを管理する。
|  カラム名  |  属性  |  役割  |
| ---- | ---- | ---- |
|  id  |  unsigned bigint/PRIMARY KEY/NOT NULL  |  ジャンルを識別するID  |
|  name  |  varchar(255)/NOT NULL  |  ジャンルの名前  |
|  created_at  |  timestamp  |  作成日時  |
|  updated_at  |  timestamp  |  更新日時  |

####  bookingsテーブル
予約情報を管理する。
|  カラム名  |  属性  |  役割  |
| ---- | ---- | ---- |
| id  |  unsigned bigint/PRIMARY KEY/NOT NULL  |  予約情報を識別するID  |
| shop_id  |  unsigned bigint/NOT NULL  |  飲食店を識別するID  |
| user_id  |  unsigned bigint/NOT NULL  |  ユーザーを識別するID  |
| booking_date  |  date/NOT NULL  |  予約日  |
| booking_time  |  time/NOT NULL  |  予約時間  |
| number  |  unsigned tinyint/NOT NULL  |  予約人数  |
| created_at  |  timestamp  |  作成日時  |
| updated_at  |  timestamp  |  更新日時  |

####  favoritesテーブル
お気に入り情報を管理する。
|  カラム名  |  属性  |  役割  |
| ---- | ---- | ---- |
|  id  |  unsigned bigint/PRIMARY KEY/NOT NULL  |  お気に入り情報を識別するID  |
|  shop_id  |  unsigned bigint/NOT NULL  |  飲食店を識別するID  |
|  user_id  |  unsigned bigint/NOT NULL  |  ユーザーを識別するID  |
|  created_at  |  timestamp  |  作成日時  |
|  updated_at  |  timestamp  |  更新日時  |