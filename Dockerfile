FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git unzip sqlite3 libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install

RUN mkdir -p database
RUN touch database/database.sqlite

ENV DB_CONNECTION=sqlite

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=10000