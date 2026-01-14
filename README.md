# Tempest Sample

This repository contains the default scaffold for Tempest.

The source code for the framework itself can be found at [tempestphp/tempest-framework](https://github.com/tempestphp/tempest-framework).

```sh
composer create-project tempest/app
```

Check out the [documentation](https://tempestphp.com). · Join the [Discord](https://tempestphp.com/discord) server.

# developing environment

## prerequisites

- Docker
- Docker Compose

```sh
# build
docker compose build

# install dependencies
docker compose run --rm --entrypoint "composer install" application

# up (add `--build` only if needed)
docker compose up -d

# down
docker compose down
```

## proxy

http://localhost:8080

## application

http://app.localhost:8080

## phpmyadmin

http://phpmyadmin.localhost:8080

## smtp

http://smtp.localhost:8080

# CI

using `carthage-software/mago`

```sh
# format
docker compose exec application composer format

# lint
docker compose exec application composer lint
```
