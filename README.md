# Codebase Server

Codebase is a web application base on Lumen Framework 9.x with expressive, elegant syntax.

## Hosts within environment

| Service | Hostname | Port number |
| ------- | -------- | ----------- |
| Nginx   | nginx    | 80, 443     |
| Lumen   | Lumen    | 9000        |
| MySQL   | mysql    | 3306        |
| Redis   | redis    | 6379        |

## Installation

Open your favorite Terminal and run these commands.

For development environment:

```sh
$ docker-compose up -d
$ docker-compose exec codebase-lumen-dev sh
$ composer install
$ php artisan db:seed

```

For production environment:

```sh

$ docker-compose  up -d
$ docker-compose exec codebase-lumen-dev sh sh
$ php artisan db:seed
```

Verify the deployment by navigating to your server address in your preferred browser.

```sh
http://127.0.0.1/
```
