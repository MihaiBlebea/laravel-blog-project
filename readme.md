
## How to install?

- Install docker on your machine
- Run "docker-compose up -d --build"
- Run "composer db-fresh"
- Run "npm install"
- Run "npm run dev"
- Run "npm run watch"

## Check Crontab

- EDITOR=nano crontab -e
- crontab -l
- local command in crontab: * * * * * cd /Users/mihai.blebea/Sites/blog-project && docker-compose exec php-fpm php artisan schedule:run  > cron/cron_log.txt

# cd /root/production/web && /usr/bin/docker exec laravel-blog-project-php-fpm php artisan schedule:run >> cron_log.txt

# Use this in local testing
cd /Users/mihai.blebea/Sites/blog-project && /usr/local/bin/docker exec laravel-blog-project-php-fpm php artisan schedule:run >> cron_log.txt
cd /Users/mihai.blebea/Sites/blog-project && /usr/local/bin/docker exec laravel-blog-project-php-fpm php artisan schedule:run >>
