FROM phusion/baseimage:latest
MAINTAINER Lobsiinvok "lobsiinvok@tdohacker.org"

ENV DEBIAN_FRONTEND noninteractive

CMD ["/sbin/my_init"]

RUN apt-get update \
  && apt-get install -y xinetd

# crypto - level3
COPY md5.xinetd /etc/xinetd.d/md5

# level1
COPY shellcode.xinetd /etc/xinetd.d/shellcode

# level2
COPY global.xinetd /etc/xinetd.d/global

RUN mkdir /etc/service/xinetd
ADD xinetd.sh /etc/service/xinetd/run
