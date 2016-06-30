FROM debian:jessie
MAINTAINER Yann Cézard "yann.cezard@objectif-libre.com"

RUN DEBIAN_FRONTEND=noninteractive apt-get update && \
         apt-get -y install apache2 && \
         sed -ri ' \
            s!^(\s*CustomLog)\s+\S+!\1 /proc/self/fd/1!g; \ 
            s!^(\s*ErrorLog)\s+\S+!\1 /proc/self/fd/2!g;' \
            /etc/apache2/conf-available/other-vhosts-access-log.conf \
            /etc/apache2/sites-available/default-ssl.conf \
            /etc/apache2/sites-available/000-default.conf \
	    /etc/apache2/apache2.conf && \
         mkdir /var/run/apache2/ /var/lock/apache2/ && \
         rm -rf /var/www/html/* && \
         rm -rf /var/lib/apt/lists/*

RUN DEBIAN_FRONTEND=noninteractive apt-get update && \
         apt-get -y install libapache2-mod-php5 \
                            php5-mysql && \
         rm -rf /var/lib/apt/lists/*

EXPOSE 80

CMD ["/bin/bash", "-c", "source /etc/apache2/envvars && rm -f $APACHE_PID_FILE && exec /usr/sbin/apache2 -DFOREGROUND"]
