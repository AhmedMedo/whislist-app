
## Installation

after clone the project , Install the project with laravel sail

```bash
  cd project
  cp .env.example .env
  ./vendor/bin/sail up -d
  ./vendor/bin/sail shell
  php artisan migrate
  php artisan db:seed
```
if you faced any issue follow this link [laravel sail](https://laravel.com/docs/10.x/sail#introduction)


## API Reference

#### Get all items

```http
  GET /api/items
```

#### Get item

```http
  GET /api/items/show/${id}
```

| Parameter | Type     | Description                       |
|:----------|:---------|:----------------------------------|
| `id`      | `string` | **Required**. Id of item to fetch |


#### Save item

```http
  POST /api/items/
```

| Parameter | Type     | Description   |
|:----------|:---------|:--------------|
| `name`    | `string` | **Required**. |
| `price`   | `string` | **Required**. |
| `seller`  | `string` | nullable      |


#### Get items statistics

```http
  GET /api/items/statistics
```


## Demo

to see the demo table list for items
localhost:8082/items
