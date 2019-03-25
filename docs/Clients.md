# Clients

## List of clients:
[Check out the official documentation](https://billingo.readthedocs.io/en/latest/clients/#list-of-clients)
```php
\Otisz\Billingo\Contracts\Clients::all(int $page = 1, int $maxPerPage = 20)
```
**Note:** If `$maxPerPage` is greater than 50, then `\Otisz\Billingo\Exceptions\TooManyResourcePerPageException::class` will be thrown.

## Create a client:
[Check out the official documentation](https://billingo.readthedocs.io/en/latest/clients/#create-a-client)
```php
\Otisz\Billingo\Contracts\Clients::create(array $clientPayload)
```

## Find a client:
[Check out the official documentation](https://billingo.readthedocs.io/en/latest/clients/#list-of-clients)
```php
\Otisz\Billingo\Contracts\Clients::find(int|string $clientId)
```

## Update a client:
[Check out the official documentation](https://billingo.readthedocs.io/en/latest/clients/#update-a-client)
```php
\Otisz\Billingo\Contracts\Clients::update(int|string $clientId, array $clientPayload)
```

## Delete a client:
[Check out the official documentation](https://billingo.readthedocs.io/en/latest/clients/#delete-client)
```php
\Otisz\Billingo\Contracts\Clients::destroy(int|string $clientId)
```