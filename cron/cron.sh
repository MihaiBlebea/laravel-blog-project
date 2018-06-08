#!bin/bash

# Use this on server
# cd /root/production/web && /usr/bin/docker exec laravel-blog-project-php-fpm php artisan schedule:run >> cron_log.txt

# Use this in local testing
cd /Users/mihai.blebea/Sites/blog-project && /usr/local/bin/docker exec laravel-blog-project-php-fpm php artisan schedule:run >> cron/cron_log.txt
