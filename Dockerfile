FROM nginx:stable-alpine

ENV NGNIXUSER=laravel
ENV NGNIXGROUP=laravel

RUN mkdir -p /var/www/html/public

# copy local file of nginx
ADD nginx/default.conf /etc/nginx/conf.d/default.conf

# s/ means (substitute command and string to find (user www-data) and string to replace(user laravel) )
RUN sed -i "s/user www-data/user ${NGNIXUSER}/g" /etc/nginx/nginx.conf

RUN adduser -g ${NGNIXGROUP} -s bin/sh -D ${NGNIXUSER}