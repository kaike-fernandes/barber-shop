FROM php:7.4-apache

# Instala extensões necessárias
RUN docker-php-ext-install pdo pdo_mysql

# Instala dependências do sistema e Composer
RUN apt-get update && apt-get install -y unzip curl \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# Define diretório do app
WORKDIR /var/www/html

# Copia arquivos do projeto para dentro do container
COPY . .

# Instala dependências do Composer (dentro do container)
RUN composer install --no-dev --optimize-autoloader

# Permissões para Apache
RUN chown -R www-data:www-data /var/www/html

# Porta padrão
EXPOSE 80
