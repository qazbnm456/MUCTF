#!/bin/sh
exec /usr/sbin/xinetd -dontfork >> /var/log/xinetd.log 2>&1
