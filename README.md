
# Todoアプリ

このリポジトリは、Laravelを使用したTodoアプリです。

## 環境構築

#### リポジトリをクローン

```
git clone git@github.com:koko-chii/todo3.git
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
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
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

Webサーバー：nginx:1.21.1

データベース：mysql:8.0.26

## ER図

![ER図](todo.drawio.png)

## URL

アプリケーション：http://localhost


phpMyAdmin：http://localhost:8080

