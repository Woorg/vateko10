# Step 1: Build stage
FROM php:8.3-apache AS build

# Install necessary PHP extensions
RUN apt-get update && apt-get install -y \
  git \
  && docker-php-ext-install mysqli pdo pdo_mysql

# Set working directory
WORKDIR /var/www/html

# Clone the WordPress repository
RUN git clone https://github.com/Woorg/vateko10.git .

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
  && composer install --no-dev --optimize-autoloader

# Step 2: Final production image
FROM php:8.3-apache

# Copy the built application from the build stage
COPY --from=build /var/www/html /var/www/html

# Enable Apache mod_rewrite for WordPress
RUN a2enmod rewrite

# Expose port 80
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
