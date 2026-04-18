# Base PHP 8.2 Apache image
FROM php:8.2-apache

# Install required tools and mysqli extension
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    default-mysql-client \
    libmysqlclient-dev \
    && docker-php-ext-install mysqli \
    && docker-php-ext-enable mysqli


# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy BPMS website into container
COPY . /var/www/html/

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

EXPOSE 80
