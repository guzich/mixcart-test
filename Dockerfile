FROM php:7.4-fpm

RUN apt-get update && apt-get install -y nginx supervisor git
RUN apt-get update && apt-get install -y procps telnet

COPY ./nginx.conf /etc/nginx/sites-enabled/default
COPY ./nginx.supervisor /etc/supervisor/conf.d/nginx.conf
COPY ./php-fpm.supervisor /etc/supervisor/conf.d/php-fpm.conf
COPY ./run-queue.supervisor /etc/supervisor/conf.d/run-queue.conf


RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer


COPY ./docker-entrypoint.sh /
RUN chmod +x /docker-entrypoint.sh
CMD /docker-entrypoint.sh

WORKDIR /var/www
EXPOSE 80