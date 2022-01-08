Run locally:
0)
git clone https://github.com/ftezzahra/sf5.git
1)
composer install
2)
php bin/console doctrine:database:create
3)
php bin/console doctrine:migrations:migrate
4)
symfony server:start