# Step 1: Build stage
FROM php:8.3-apache AS build

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
  libpng-dev \
  libjpeg-dev \
  libfreetype6-dev \
  zip \
  unzip \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install gd

# Set working directory
WORKDIR /var/www/html

# Copy composer files for PHP dependencies
COPY composer.json composer.lock ./
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
  && composer install --no-dev --optimize-autoloader



# Copy the rest of the application code
COPY . .

# Optional: Run any build scripts
# RUN yarn build

# Step 2: Final production image
FROM php:8.3-apache

# Copy the built application from the build stage
COPY --from=build /var/www/html /var/www/html

# Expose port 80
EXPOSE 80

# Start the Apache server
CMD ["apache2-foreground"]
