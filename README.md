Subscriptions Application
========================

This is an example application to demonstrate and learn how to use different types of automated test.

Installation
--------------

All you need to run this app is [https://www.docker.com](Docker)

First of all create local environment file `.env.local` in root path. And specify parameters you might want ot change.
At least it will be:

```bash
MYSQL_ROOT_PASSWORD='SpecifyYourRootPasswordHere'
MYSQL_PASSWORD='SpecifyDbUserPasswordHere'
```

Then just execute

```bash
docker-compose up -d
```

Install dependencies

```bash
docker-compose exec fpm composer install
```

Install assets

```bash
docker-compose exec node yarn install --force
```

And go to check your app [http://localhost](http://localhost)

Database
--------

There is no migrations used, so just execute 

```bash
docker-compose exec fpm php bin/console doctrine:schema:create
```

Admin Panel
----------

Create admin user

```bash
docker-compose exec fpm php bin/console fos:user:create admin --super-admin
```