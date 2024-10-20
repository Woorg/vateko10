# Step 1: Build stage
FROM php:8.3-fpm AS build

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
  libpng-dev \
  libjpeg-dev \
  libfreetype6-dev \
  zip \
  git \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install gd

# Set working directory
WORKDIR /var/www/html

# Clone the repository (Make sure the repo has plugins and themes in the right directories)
RUN git clone https://github.com/Woorg/vateko10.git . 

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
  && composer install --no-dev --optimize-autoloader

# Copy plugins and themes directories from the cloned repository to the right locations
# Copy plugins and themes if they don't exist
RUN mkdir -p /var/www/html/wp-content/plugins /var/www/html/wp-content/themes && \
  for dir in wp-content/plugins/*; do \
  [ ! -d "/var/www/html/$dir" ] && cp -R "$dir" /var/www/html/wp-content/plugins/; \
  done && \
  for dir in wp-content/themes/*; do \
  [ ! -d "/var/www/html/$dir" ] && cp -R "$dir" /var/www/html/wp-content/themes/; \
  done



# Step 2: Final production image
FROM nginx:latest

# Copy the built application from the build stage
COPY --from=build /var/www/html /var/www/html

# Copy Nginx configuration file
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Expose port 80
EXPOSE 80

# Start Nginx
CMD ["nginx", "-g", "daemon off;"]
