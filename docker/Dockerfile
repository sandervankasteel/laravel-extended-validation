FROM php:8.1-alpine

RUN apk update && \
    apk add composer \
    bash \
    php81-bcmath \
    php81-dom \
    php81-tokenizer \
    php81-fileinfo \
    php81-xml \
    php81-xmlwriter \
    php81-pecl-xdebug

RUN docker-php-ext-install bcmath && docker-php-ext-enable bcmath

ENTRYPOINT ["tail"]
CMD ["-f","/dev/null"]