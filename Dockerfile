# Step 1: Build stage
FROM php:8.3-apache AS build

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
  libpng-dev \
  libjpeg-dev \
  libfreetype6-dev \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install gd

# Set working directory
WORKDIR /var/www/html

# Copy composer files for PHP dependencies
COPY composer.json composer.lock ./
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
  && composer install --no-dev --optimize-autoloader

# Copy package.json for Node.js dependencies (if applicable)
COPY package.json yarn.lock ./
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
  && echo "deb https://dl.yarnpkg.com/debian/ stable main" >> /etc/apt/sources.list \
  && apt-get update && apt-get install -y yarn \
  && yarn install --production

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
