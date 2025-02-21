# Gunakan image PHP dengan Apache
FROM php:8.1-apache

# Install ekstensi PHP yang dibutuhkan
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Set working directory
WORKDIR /var/www/html

# Copy semua file ke dalam container
COPY . .

# Berikan izin writable pada folder yang diperlukan
RUN chown -R www-data:www-data /var/www/html/writable \
    && chmod -R 777 /var/www/html/writable

# Aktifkan mode rewrite di Apache
RUN a2enmod rewrite

# Expose port Apache
EXPOSE 80 443

# Jalankan Apache
CMD ["apache2-foreground"]