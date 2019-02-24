FROM ubuntu:16.04

RUN apt-get update && apt-get install -y openssh-server
RUN mkdir /var/run/sshd
RUN echo 'root:screencast' | chpasswd
RUN sed -i 's/PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config

# SSH login fix. Otherwise user is kicked off after login
RUN sed 's@session\s*required\s*pam_loginuid.so@session optional pam_loginuid.so@g' -i /etc/pam.d/sshd

ENV NOTVISIBLE "in users profile"
RUN echo "export VISIBLE=now" >> /etc/profile


###
## Install staff
###
RUN apt-get install -y --no-install-recommends --no-install-suggests nginx supervisor php php-fpm ca-certificates gettext && \
    rm -rf /var/lib/apt/lists/*


###
## PHP-FPM and NGINX
###
# forward request and error logs to docker log collector
RUN ln -sf /dev/stdout /var/log/nginx/access.log \
	&& ln -sf /dev/stderr /var/log/nginx/error.log \
	&& ln -sf /dev/stderr /var/log/php7.0-fpm.log

RUN rm -f /etc/nginx/sites-enabled/*

COPY nginx.conf.tpl /tmp/nginx.conf.tpl
COPY php-fpm.conf.tpl /tmp/php-fpm.conf.tpl

RUN mkdir -p /run/php && touch /run/php/php7.0-fpm.sock && touch /run/php/php7.0-fpm.pid


###
## SUPERVISOR
###

COPY supervisor.conf /etc/supervisor/conf.d/supervisor.conf

###
## APPS
###
COPY app.php /var/www/html/app.php


###
## RUN
###
EXPOSE 80 22
CMD ["/usr/bin/supervisord"]
