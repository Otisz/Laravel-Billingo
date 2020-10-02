# Partners

## Content of page

- [Index](#index)
- [Store](#store)
- [Show](#show)
- [Update](#update)
- [Destroy](#destroy)

## Official documentation

[https://app.swaggerhub.com/apis/Billingo/Billingo/#/Partner](https://app.swaggerhub.com/apis/Billingo/Billingo/#/Partner)

---

### Index
#### Params

```json
{
  "page": {
    "type": "integer",
    "default": 1
  },
  "per_page": {
    "type": "integer",
    "default": 25
  }
}
```

## Usage

```php
\Billingo::partners()->index(array $payload)
```

## Example Request
```php
[
  "page" => 1,
  "per_page" => 1
]
```