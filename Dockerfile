FROM php:8.4-apache

# Instalar extensiones que suele necesitar un proyecto clásico
RUN docker-php-ext-install mysqli pdo pdo_mysql && \
    a2enmod rewrite

# Copiamos tu código si no montas volumen (opcional)
# COPY ./src /var/www/html
