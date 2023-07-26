# PHP 7.4イメージをベースにする
FROM php:7.4-fpm

# 必要なパッケージをインストールする
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# コンテナ内に作業ディレクトリを作成する（任意のディレクトリを指定可能）
WORKDIR /var/www/html
