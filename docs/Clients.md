# Clients

## List of clients:
[Check out the official documentation](https://billingo.readthedocs.io/en/latest/clients/#list-of-clients)
```php
\Billingo::clients()->all(int $page = 1, int $maxPerPage = 20)
```

## Create a client:
[Check out the official documentation](https://billingo.readthedocs.io/en/latest/clients/#create-a-client)
```php
\Billingo::clients()->create(array $clientPayload)
```

## Find a client:
[Check out the official documentation](https://billingo.readthedocs.io/en/latest/clients/#list-of-clients)
```php
\Billingo::clients()->find(int $clientId)
```

## Update a client:
[Check out the official documentation](https://billingo.readthedocs.io/en/latest/clients/#update-a-client)
```php
\Billingo::clients()->update(int $clientId, array $clientPayload)
```

## Delete a client:
[Check out the official documentation](https://billingo.readthedocs.io/en/latest/clients/#delete-client)
```php
\Billingo::clients()->destroy(int $clientId)
```