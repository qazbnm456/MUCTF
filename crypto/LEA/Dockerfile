FROM alpine

# add python
RUN apk --update add python

# define the service name used throughout the rest of the dockerfile
ENV service md5

# add the service user and copy in the files
RUN adduser -D ${service}
COPY . /

# /home
RUN chown root.root /home
RUN chmod 755 /home

# service home directory
RUN chown root.${service} /home/${service}
RUN chmod 750 /home/${service}

# home script
RUN chown root.root /home/${service}/*
RUN chmod 755 /home/${service}/${service}.py

# home flag
#RUN chown root.${service} /home/${service}/flag
#RUN chmod 540 /home/${service}/flag

# /lib
#RUN chown -R root.root /lib
#RUN chmod -R 755 /lib
#RUN chown -R root.root /lib64
#RUN chmod -R 755 /lib64

# user and starting directory
USER ${service}
WORKDIR /home/${service}

# binary to run
CMD ["/usr/bin/python", "-u", "/home/md5/md5.py"]
