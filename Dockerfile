# Use a imagem base PHP com Apache
FROM php:8.1-apache

# Instalar dependências necessárias, incluindo GD e MySQLi
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-ext-enable mysqli

# Habilitar o Apache
CMD ["apache2-foreground"]