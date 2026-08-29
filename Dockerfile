FROM php:8.4-cli

WORKDIR /var/www/html

# Install system dependencies + Node.js
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    curl \
    && docker-php-ext-install zip \
    && curl -fsSL https://deb.nodesource.com/setup_24.x | bash - \
    && apt-get install -y nodejs

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install PHP dependencies first
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

# Install Node dependencies first
COPY package.json package-lock.json ./
RUN npm ci

# Copy the rest of the project
COPY . .

# Build frontend assets for production
RUN npm run build

# Optimize Laravel autoload
RUN composer dump-autoload --optimize

CMD php -S 0.0.0.0:${PORT:-8080} -t public