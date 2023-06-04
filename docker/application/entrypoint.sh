#!/bin/bash

# Execute les migrations doctrine si nécessaire
cd /var/www
php bin/console --no-interaction doctrine:migrations:migrate

# Pour Dockerfile
/usr/sbin/apache2ctl -DFOREGROUND
