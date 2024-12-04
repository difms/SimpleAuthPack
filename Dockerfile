FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \ 
    postgresql-client

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . /var/www/html/

RUN chmod +x /var/www/html/wait-for-postgres.sh

RUN cp /var/www/html/.env.example /var/www/html/.env

RUN composer install \
    && chown -R www-data:www-data /var/www/html


EXPOSE 8000

CMD ["sh", "-c", "./wait-for-postgres.sh && php artisan serve --host=0.0.0.0 --port=8000"]
