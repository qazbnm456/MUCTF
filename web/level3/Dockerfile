FROM phusion/passenger-ruby22
MAINTAINER "lobsiinvok@tdohacker.org"

# Set correct environment variables.
ENV HOME /root

# Use baseimage-docker's init process.
CMD ["/sbin/my_init"]

RUN apt-get -y update \
  && apt-get install -y php5-fpm

RUN mkdir /etc/service/php5-fpm
COPY php5-fpm.sh /etc/service/php5-fpm/run

RUN mkdir -p /etc/my_init.d
ADD start.sh /etc/my_init.d/start.sh

COPY default.conf /etc/nginx/sites-enabled
COPY . /usr/share/nginx/html

RUN find /usr/share/nginx/html/ -type d -exec chmod 775 {} \;
RUN find /usr/share/nginx/html/ -type f -exec chmod 644 {} \;
RUN chown -R root:www-data /usr/share/nginx/html/

RUN rm /etc/nginx/sites-enabled/default \
  && rm -f /etc/service/nginx/down

# Clean up APT when done.
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
