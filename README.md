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

And go to check your app [http://localhost](http://localhost)