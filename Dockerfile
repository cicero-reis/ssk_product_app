# 🏗️ Primeira etapa: Construção do Laravel (Instalar dependências) 
FROM composer:2 AS build
WORKDIR /var/www
COPY . /var/www
RUN composer install --no-dev --optimize-autoloader

# 🐘 Segunda etapa: PHP + Laravel + Node.js
FROM php:8.2-fpm-alpine
WORKDIR /var/www

# Instalar dependências do PHP
RUN apk add --no-cache \
    nginx supervisor curl git unzip \
    libpng-dev libjpeg-turbo-dev libwebp-dev \
    freetype-dev oniguruma-dev icu-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install gd pdo pdo_mysql mbstring

# 🟢 Instalar Node.js, npm e Yarn
RUN apk add --no-cache nodejs npm yarn

# Copiar o código Laravel da etapa de build
COPY --from=build /var/www /var/www

# Definir permissões
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage

# 🔥 Configurar o Nginx
RUN mkdir -p /run/nginx
COPY nginx.conf /etc/nginx/nginx.conf

# 🔥 Configurar o Supervisor para rodar PHP-FPM e Nginx juntos
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

EXPOSE 80
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
