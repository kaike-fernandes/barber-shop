# Etapa 1: Imagem oficial do Composer
FROM composer:2 AS composer

# Etapa 2: Imagem principal com PHP + Apache
FROM php:7.4-apache

# Instala extensões necessárias do PHP
RUN docker-php-ext-install pdo pdo_mysql

# Copia o Composer da imagem anterior
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Define o diretório de trabalho
WORKDIR /var/www/html

# Copia os arquivos do projeto
COPY . .

# Instala as dependências do Composer
RUN composer install --no-dev --optimize-autoloader

# Ajusta permissões para o Apache
RUN chown -R www-data:www-data /var/www/html

# Expõe a porta padrão do Apache
EXPOSE 80
