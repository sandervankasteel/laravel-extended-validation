FROM php:8.0-alpine

RUN apk update && \
    apk add composer \
    bash \
    php8-dom \
    php8-tokenizer \
    php8-fileinfo \
    php8-xml \
    php8-xmlwriter \
    php8-pecl-xdebug

RUN docker-php-ext-install bcmath

ENTRYPOINT ["tail"]
CMD ["-f","/dev/null"]