# Используйте образ PHP с установленными расширениями
FROM php:7.4-fpm

# Устанавливаем зависимости
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libxml2-dev \
        libzip-dev \
        libonig-dev \
        zip \
        unzip

# Устанавливаем расширения PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo_mysql

# Копируем файлы проекта в контейнер
WORKDIR /app
COPY . /app

# Устанавливаем зависимости Laravel
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install

# Команда для запуска сервера разработки Laravel
CMD php artisan serve --host=0.0.0.0
