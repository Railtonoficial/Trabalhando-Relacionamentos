FROM php:8.4-fpm-alpine

# Instalar dependências do sistema
RUN apk update && apk add --no-cache \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    zip \
    unzip \
    git \
    curl \
    oniguruma-dev \
    libxml2-dev \
    icu-dev \
    g++ \
    sqlite-dev

# Instalar extensões do PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd pdo_sqlite

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurar o diretório de trabalho
WORKDIR /var/www

# Copiar o projeto para o contêiner
COPY . .

# Permitir plugins do Composer como superusuário
ENV COMPOSER_ALLOW_SUPERUSER=1

# Instalar dependências do Composer
RUN composer install --ignore-platform-reqs

# Ajustar permissões das pastas storage e bootstrap/cache
RUN mkdir -p storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Expor a porta 9000 para o PHP-FPM
EXPOSE 9000

# Iniciar o PHP-FPM e o servidor embutido do PHP
CMD ["sh", "-c", "php-fpm & php -S 0.0.0.0:80 -t public"]
