FROM wordpress
RUN a2enmod ssl
COPY 001-puerto-fpr-pl.conf /etc/apache2/sites-enabled
COPY php.ini /usr/src/wordpress
RUN mkdir -p /usr/src/wordpress/.well-known/acme-challenge