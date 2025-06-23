FROM php:7.4-apache

# Instala as extensões do MySQL necessárias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copia o conteúdo do projeto para o Apache
COPY . /var/www/html/

# Expõe a porta padrão do Apache
EXPOSE 80