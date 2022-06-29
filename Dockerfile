FROM phusion/baseimage:0.10.1

ENV LANG       en_US.UTF-8
ENV LC_ALL     en_US.UTF-8

CMD ["/sbin/my_init"]

RUN add-apt-repository -y ppa:ondrej/php \
    && apt-get update \
    && DEBIAN_FRONTEND="noninteractive" apt-get install -y --force-yes \
        wget \
        curl \
        git \
        php7.0-cli \
        php7.0-curl \
        php7.0-fpm \
        php7.0-xml \
        php7.0-mbstring \
        php7.0-mcrypt \
        php7.0-xdebug \
        php7.0-mysql \
        php7.0-memcached \
        php-zmq \
        unzip \
        nginx \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /etc/nginx/sites-enabled/default

# misc commands and configs
RUN sed -i "s/;date.timezone =.*/date.timezone = UTC/" /etc/php/7.0/fpm/php.ini \
    && sed -i "s/;date.timezone =.*/date.timezone = UTC/" /etc/php/7.0/cli/php.ini \
    && sed -i -e "s/;daemonize\s*=\s*yes/daemonize = no/g" /etc/php/7.0/fpm/php-fpm.conf \
    && sed -i "s/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/" /etc/php/7.0/fpm/php.ini \
    && mkdir -p /var/www /etc/my_init.d /etc/service/phpfpm /data/config /run/php /etc/service/nginx \
    && echo "daemon off;" >> /etc/nginx/nginx.conf \
    && sed -i -e "s/#\sserver_names_hash_bucket_size\s64;/server_names_hash_bucket_size 128;/g" /etc/nginx/nginx.conf

COPY server/runit/phpfpm.sh /etc/service/phpfpm/run
COPY server/runit/nginx.sh  /etc/service/nginx/run

RUN chmod +x /etc/service/phpfpm/run \
    && chmod +x /etc/service/nginx/run \
    && chown -R root:root /var/log/nginx

COPY server/scripts/* /etc/my_init.d/
RUN chmod -R +x /etc/my_init.d/

RUN ln -sf /dev/stdout /var/log/syslog && ln -sf /dev/stderr /var/log/syslog

# Nginx conf files
COPY server/sites-enabled/* /etc/nginx/sites-enabled/

EXPOSE 80