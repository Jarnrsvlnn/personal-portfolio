# Build frontend assets
FROM node:24 AS frontend

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .
RUN npm run build


# PHP application
FROM php:8.4-cli

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY composer.json composer.lock ./

RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

COPY . .

# Copy the freshly built Vite assets
COPY --from=frontend /app/public/build ./public/build

RUN composer dump-autoload --optimize

CMD php -S 0.0.0.0:${PORT:-8080} -t public