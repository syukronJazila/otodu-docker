# Base image PHP + Apache
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Copy semua file website ke container
COPY ./website .

# Aktifkan mod_rewrite Apache (untuk .htaccess/URL friendly)
RUN a2enmod rewrite

# Install ekstensi PHP untuk MySQL
RUN docker-php-ext-install mysqli

# Expose port 80
EXPOSE 80

# Jalankan Apache di foreground
CMD ["apache2-foreground"]