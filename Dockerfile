FROM php:7.4-apache

# Instala extensões necessárias
RUN docker-php-ext-install pdo pdo_mysql

# Instala o Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Define o diretório de trabalho
WORKDIR /var/www/html

# Copia os arquivos do projeto
COPY . .

# Instala as dependências do Composer
RUN composer install --no-dev --optimize-autoloader

# Dá permissão ao Apache para acessar os arquivos
RUN chown -R www-data:www-data /var/www/html

# Expõe a porta padrão do Apache
EXPOSE 80