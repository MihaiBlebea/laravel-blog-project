#! #!/usr/bin/env bash

docker-compose up -d --build
docker-compose exec php-fpm bash -c "composer db-fresh;exit"
npm install
npm run dev
open http://localhost:8081
npm run watch
