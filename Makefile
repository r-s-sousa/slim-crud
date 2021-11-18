t=

up:
	docker-compose up
down:
	docker-compose down
php:
	docker exec -it desafioMovaPhp bash
db:
	docker exec -it desafioMovaSql bash -c "mysql -u rafael -p'Rafinha@123' endereco"
install:
	composer install
update:
	composer update