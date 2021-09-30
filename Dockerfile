FROM webdevops/php-nginx:7.3

ADD . /app

WORKDIR /app

ENV APP_KEY=
ENV APP_DEBUG=true
ENV APP_URL=http://localhost
ENV LOG_LEVEL=debug
ENV DB_HOST=
ENV DB_PORT=
ENV DB_DATABASE=
ENV DB_USERNAME=
ENV DB_PASSWORD=

RUN chmod -R 777 storage

RUN composer install

RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

VOLUME ["/app/storage"]
