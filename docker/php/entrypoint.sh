#!/bin/sh

sleep 20  &&  cd /usr/src/app && chmod o+w /usr/src/app/storage/ -R  && php artisan key:generate && php artisan migrate  && php artisan db:seed &&  php artisan optimize
exec $@
