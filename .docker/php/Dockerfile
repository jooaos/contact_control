FROM php:8.0.3-fpm-alpine

ARG USER_ID=1000
ARG GROUP_ID=1000

RUN apk add --no-cache openssl bash mysql-client
RUN docker-php-ext-install pdo pdo_mysql

RUN apk add --update --no-cache \
        vim \
        nano \
        htop \
        freetype-dev \
        libjpeg-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        openrc \
    && docker-php-ext-configure gd \
    && docker-php-ext-install -j"$(getconf _NPROCESSORS_ONLN)" gd \
	&& docker-php-ext-enable gd \
    && docker-php-ext-install bcmath sockets

RUN rm -rf /var/www/html

COPY ./php.ini.development "$PHP_INI_DIR/php.ini"

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version=2.1.11

RUN ln -s public html

EXPOSE 9000

RUN addgroup -g ${GROUP_ID} devgroup 
RUN adduser -D -u ${USER_ID} -G devgroup devuser

WORKDIR /var/www

RUN chown devuser:devgroup /var/www 

USER devuser