# Step 1: Build stage
FROM php8.3-fpm AS build

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
  libpng-dev \
  libjpeg-dev \
  libfreetype6-dev \
  zip \
  unzip \
  git \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install gd

# Set working directory
WORKDIR /var/www/html

# Clone the repository
RUN git clone https://github.com/Woorg/vateko10.git .

# Install Composer and PHP dependencies
COPY composer.json composer.lock ./
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
  && composer install --no-dev --optimize-autoloader

# Copy themes and plugins to the appropriate directories
COPY wp-content/themes /var/www/html/wp-content/themes
COPY wp-content/plugins /var/www/html/wp-content/plugins

# Step 2: Nginx + PHP-FPM for production
FROM nginx:latest

# Install PHP-FPM
RUN apt-get update && apt-get install -y php8.3-fpm

# Copy the built application from the build stage
COPY --from=build /var/www/html /var/www/html

# Copy custom Nginx configuration
COPY nginx.conf /etc/nginx/nginx.conf

# Expose port 80
EXPOSE 80

# Start Nginx and PHP-FPM
CMD service php8.3-fpm start && nginx -g 'daemon off;'
