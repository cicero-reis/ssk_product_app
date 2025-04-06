#!/bin/bash

echo "🚀 Iniciando configuração do Laravel..."

echo '📦 Instalando dependências do Composer...';
composer install --no-dev --optimize-autoloader

#php artisan key:generate
#echo '🔑 Gerando chave da aplicação...';

echo '🧹 Limpando configurações e cache...';
php artisan config:clear
php artisan cache:clear
php artisan migrate --force
php artisan storage:link

echo '📂 Criando link do storage...';
php artisan storage:link;

echo '📊 Rodando as migrations...';
php artisan migrate --force;

echo '✅ Configuração concluída!';
