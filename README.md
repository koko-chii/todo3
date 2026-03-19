# laravel-docker-template

# お問い合わせフォーム

このリポジトリは、Laravelを使用したお問い合わせ管理システムです。

## 環境構築

#### リポジトリをクローン

```
git clone git@github.com:xxx/xxx.git
```

#### Laravelのビルド

```
docker-compose up -d --build
```

#### Laravel パッケージのダウンロード

```
docker-compose exec app composer install
```

```
docker-compose exec app npm install && npm run dev
```

#### .env ファイルの作成

```
cp .env.example .env
```

#### .env ファイルの修正

```
DB_CONNECTION=mysql
DB_HOST=db
DB_DATABASE=laravel_db
DB_USERNAME=phper
DB_PASSWORD=secret

```

#### キー生成

```
docker-compose exec app php artisan key:generate
```

#### マイグレーション・シーディングを実行

```
docker-compose exec app php artisan migrate --seed
```

## 使用技術（実行環境）

フレームワーク：Laravel 8.x (v8.75)

言語：PHP 7.3 / 8.0 以上

Webサーバー：Nginx

データベース：MySQL

## ER図

![ER図](xxxx.drawio.png)

## URL

アプリケーション：http://localhost

管理画面：http://localhost/admin

phpMyAdmin：http://localhost:8080

