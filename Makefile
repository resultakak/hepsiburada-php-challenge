
install:
	composer install

serve:
	APPLICATION_ENV=development php -S 0.0.0.0:8080 -t public/

phpunit:
	php bin/phpunit ./tests/ --debug

phpfix:
	php bin/php-cs-fixer fix src

phpcs:
	php bin/phpcs --standard=PSR2 ./src

phpmd:
	php bin/phpmd src/ text codesize,unusedcode,naming,cleancode

phpstan:
	php bin/phpstan analyse src/ tests/ --level 7

psalm:
	php bin/psalm --show-info=true

psalm-init:
	php bin/psalm --init

test: phpunit phpfix phpcs phpstan psalm phpmd

clean:
	rm -rf vendor && rm composer.lock
