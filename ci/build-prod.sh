#! #!/usr/bin/env bash

git pull

sed -i '' 's/production/local/g' .env

docker-compose stop &&
docker-compose up -d --build &&
docker-compose exec php-fpm bash -c "composer db-fresh;exit";

sed -i '' 's/local/production/g' .env

npm install && npm run prod
