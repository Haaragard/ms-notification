FROM hyperf/hyperf:8.3-alpine-v3.20-swoole-v5.1.6 as base

LABEL authors="haaragard"

# Set working directory
WORKDIR /var/www/ms-notification

# Install composer
COPY --from=composer:2.8.4 /usr/bin/composer /usr/bin/composer

FROM base as dev

# Set Environment Variables
ENV USER_ID ${USER_ID:-1000}
ENV GROUP_ID ${GROUP_ID:-1000}

LABEL authors="haaragard"

# Copy all files to the container
COPY . .

RUN apk add php83-pecl-xdebug

COPY .docker/php/config/custom_xdebug.ini /etc/php83/conf.d/99_xdebug.ini

# Create new user with same user id as host user
RUN addgroup -S appgroup -g $GROUP_ID \
    && adduser -S appuser -u $USER_ID -G appgroup -G root -G www-data

RUN chown -R appuser:appgroup /var/www/ms-notification

USER appuser

RUN composer install

EXPOSE 9501
EXPOSE 9003

ENTRYPOINT ["php", "/var/www/ms-notification/bin/hyperf.php", "server:watch"]
