FROM alpine:3.14.2

RUN apk add --no-cache php7 php7-pdo php7-pdo_pgsql php7-session php7-mysqli php7-mbstring php7-xml php7-json php7-gd php7-curl php7-zip

WORKDIR /var/www/html

RUN wget https://github.com/vrana/adminer/releases/download/v4.8.1/adminer-4.8.1-en.php -O index.php

EXPOSE 8080

CMD ["php", "-S", "0.0.0.0:8080", "-t", "."]