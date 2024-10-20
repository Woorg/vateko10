# Step 1: Build stage
FROM php:8.3-apache AS build

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

# Clone the WordPress repository (or your specific repo)
RUN git clone https://github.com/Woorg/vateko10.git .

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
  && composer install --no-dev --optimize-autoloader

# Step 2: Copy themes and plugins
RUN mkdir -p wp-content/plugins wp-content/themes && \
  for dir in wp-content/plugins/*; do \
  if [ ! -e "/var/www/html/wp-content/plugins/$(basename "$dir")" ]; then \
  cp -R "$dir" /var/www/html/wp-content/plugins/; \
  fi; \
  done && \
  for dir in wp-content/themes/*; do \
  if [ ! -e "/var/www/html/wp-content/themes/$(basename "$dir")" ]; then \
  cp -R "$dir" /var/www/html/wp-content/themes/; \
  fi; \
  done

# Step 3: Final production image
FROM php:8.3-apache

# Copy the built application from the build stage
COPY --from=build /var/www/html /var/www/html

# Enable Apache mod_rewrite for WordPress
RUN a2enmod rewrite

# Expose port 80
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]