composer-install:
	docker exec -it lara-app bash -c  "composer install"

start:
	docker-compose up -d && composer-install

build:
	docker-compose up -d --build && composer-install

down:
	docker-compose down

stop:
	docker-compose stop

rm:
	docker-compose rm

run-all-tests:
	docker exec -it lara-app bash -c  "vendor/bin/phpunit"

fix-all:
	docker exec -it lara-app bash -c  "composer run-script php-cs-fixer"

seeds:
	docker exec -it lara-app bash -c  "php artisan db:seed"

migrate:
	docker exec -it lara-app bash -c  "php artisan migrate"
