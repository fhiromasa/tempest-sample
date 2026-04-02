# developing environment

## prerequisites

- Docker
- Docker Compose

```sh
# build (option `--no-cache`)
docker compose build

# install dependencies
docker compose run --rm --entrypoint "composer install" application

# up (option `--build`)
docker compose up -d

# down
docker compose down
```

## proxy

http://localhost:8080

## application

http://app.localhost:8080

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
