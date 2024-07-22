start:
	docker-compose up -d
	docker-compose run composer install
	docker exec -it php-fpm php bin/console doc:mig:mig --no-interaction
