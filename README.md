Run locally:

0)
git clone https://github.com/ftezzahra/sf5.git

1)
composer install

2)
 -- Configurer db_user et db_password dan .env --
php bin/console doctrine:database:create

3)
php bin/console doctrine:migrations:migrate

4)
symfony server:start

Routes: 

127.0.0.1:8000/api
**************
Entities: 
POST : 127.0.0.1:8000/api/entities

Users: 
POST : 127.0.0.1:8000/api/users

List of entities by User:
GET : 127.0.0.1:8000/api/users/{id_user}/entities