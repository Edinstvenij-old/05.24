FROM php:8.3-apache

RUN apt-get update && apt-get upgrade -y && apt-get install -y git

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN a2enmod rewrite

COPY default.conf /etc/apache2/sites-available/000-default.conf

# Обеспечение работы Apache на переднем плане
CMD ["apache2-foreground"]
