FROM richarvey/nginx-php-fpm
MAINTAINER "lobsiinvok@tdohacker.org"

RUN apt-get -y update \
  && apt-get -y install busybox wget

ADD . /usr/share/nginx/html/
ADD default.conf /etc/nginx/sites-available/default.conf

