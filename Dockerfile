FROM php:7.4-fpm

RUN apt-get update && apt-get install -y nginx supervisor git
RUN apt-get update && apt-get install -y procps telnet

COPY ./nginx.conf /etc/nginx/sites-enabled/default
COPY ./nginx.supervisor /etc/supervisor/conf.d/nginx.conf
COPY ./php-fpm.supervisor /etc/supervisor/conf.d/php-fpm.conf


RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
#COPY ./app/composer.json /var/www/composer.json
#COPY ./app/composer.lock /var/www/composer.lock
#RUN composer install
#RUN groupadd --gid 1723600513 node \
#  && useradd --uid 1723600513 --gid node --shell /bin/bash --create-home node

#USER 1723600513
#RUN addgroup -g 2000 node \
#    && adduser -u 2000 -G node -s /bin/sh -D node

#CMD /usr/bin/supervisord -n

COPY ./docker-entrypoint.sh /
RUN chmod +x /docker-entrypoint.sh
CMD /docker-entrypoint.sh

WORKDIR /var/www
EXPOSE 80