FROM phusion/baseimage:latest

# define the service name used throughout the rest of the dockerfile
ENV service shellcode

# add the service user and copy in the files
RUN adduser --disabled-password --gecos "" ${service}
COPY . /

# /home
RUN chown root.root /home
RUN chmod 755 /home

# service home directory
RUN chown root.${service} /home/${service}
RUN chmod 750 /home/${service}

# home binaries
RUN chown root.root /home/${service}/*
RUN chmod 755 /home/${service}/${service}

# home flag
RUN chown root.${service} /home/${service}/flag
RUN chmod 540 /home/${service}/flag

# /lib
RUN chown -R root.root /lib
RUN chmod -R 755 /lib
#RUN chown -R root.root /lib64
#RUN chmod -R 755 /lib64

# user and starting directory
USER ${service}
WORKDIR /home/${service}

# binary to run
CMD ["/home/shellcode/shellcode"]
