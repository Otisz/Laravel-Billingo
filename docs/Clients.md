# Clients

Read the official [JSON Schema](https://www.billingo.hu/json/schema/client.json).

| Local Doc | Official doc |
| --------- | ------------ |
| [List of clients](#list-of-clients) | [List of clients](https://billingo.readthedocs.io/en/latest/clients/#list-of-clients) |
| [Find a client](#find-a-client) | [Find a client](https://billingo.readthedocs.io/en/latest/clients/#list-of-clients) |
| [Create a client](#create-a-client) | [Create a client](https://billingo.readthedocs.io/en/latest/clients/#create-a-client) |
| [Update a client](#update-a-client) | [Update a client](https://billingo.readthedocs.io/en/latest/clients/#update-a-client) |
| [Delete a client](#delete-a-client) | [Delete a client](https://billingo.readthedocs.io/en/latest/clients/#delete-client) |

## List of clients:
```php
\Billingo::clients()->all(int $page = 1, int $maxPerPage = 20)
```

### Parameters
- `int $page`: Return the given page
- `int $maxPerPage`: Sets the maximum number of results to return. Absolute maximum is 50! (If you set more than 50, it will be set again 50 automatically)

### Response
```json
{
    "id": 1278331717,
    "attributes": {
        "name": "Gigazoom LLC.",
        "email": "rbrooks5@amazon.com",
        "taxcode": "",
        "type": "",
        "fokonyv_szam": "",
        "phone": "",
        "defaults": {
            "payment_method": "1",
            "electronic_invoice": "0",
            "invoice_due_days": "3",
            "invoice_currency": "HUF",
            "invoice_template_lang_code": "hu"
        },
        "billing_address": {
            "street_name": "Moulton",
            "street_type": "Terrace",
            "house_nr": "2797",
            "block": "",
            "entrance": "",
            "floor": "",
            "door": "",
            "city": "Preston",
            "postcode": "PR1",
            "country": "United Kingdom",
            "district": ""
        },
        "bank": {
            "iban": "",
            "swift": "",
            "account_no": ""
        }
    }
}
```

## Find a client:

```php
\Billingo::clients()->find(int $clientId)
```

### Params
- `int $clientId`: The client id provided by Billingo

### Response
```json
{
    "id": 1278331717,
    "attributes": {
        "name": "Gigazoom LLC.",
        "email": "rbrooks5@amazon.com",
        "taxcode": "",
        "type": "",
        "fokonyv_szam": "",
        "phone": "",
        "defaults": {
            "payment_method": "1",
            "electronic_invoice": "0",
            "invoice_due_days": "3",
            "invoice_currency": "HUF",
            "invoice_template_lang_code": "hu"
        },
        "billing_address": {
            "street_name": "Moulton",
            "street_type": "Terrace",
            "house_nr": "2797",
            "block": "",
            "entrance": "",
            "floor": "",
            "door": "",
            "city": "Preston",
            "postcode": "PR1",
            "country": "United Kingdom",
            "district": ""
        },
        "bank": {
            "iban": "",
            "swift": "",
            "account_no": ""
        }
    }
}
```

## Create a client:

### Note
If the name and (if given) the taxcode is the same as an already saved client, without modifying it, we return the original client object. If the optional `force` parameter is set to `true`, the client will be saved regardless if it exists or not.

```php
\Billingo::clients()->create(array $clientPayload)
```

### Request
```json
{
    "name": "Gigazoom LLC.",
    "email": "rbrooks5@amazon.com",
    "taxcode": "123456",
    "force": false,
    "billing_address": {
        "street_name": "Moulton",
        "street_type": "Terrace",
        "house_nr": "2797",
        "block": "A",
        "entrance": "B",
        "floor": "3.",
        "door": "17",
        "city": "Preston",
        "postcode": "PR1",
        "district": "XII",
        "country": "United Kingdom"
    },
    "phone": "",
    "bank": {
        "account_no": "12345678-12345678-12345678",
        "iban": "",
        "swift": ""
    },
    "fokonyv_szam": "",
    "type": "2",
    "defaults": {
        "payment_method": "1",
        "electronic_invoice": "0",
        "invoice_due_days": "3",
        "invoice_currency": "HUF",
        "invoice_template_lang_code": "hu"
    }
}
```

### Response
```json
{
    "id": 1963092040,
    "attributes": {
        "name": "Gigazoom LLC.2",
        "email": "rbrooks5@amazon.com",
        "taxcode": "12345678-0-00",
        "type": 2,
        "fokonyv_szam": "",
        "phone": "00123456789",
        "defaults": {
            "payment_method": "1",
            "electronic_invoice": "0",
            "invoice_due_days": "3",
            "invoice_currency": "HUF",
            "invoice_template_lang_code": "hu"
        },
        "billing_address": {
            "street_name": "Moulton",
            "street_type": "Terrace",
            "house_nr": "2797",
            "block": "A",
            "entrance": "B",
            "floor": "3.",
            "door": "17",
            "city": "Preston",
            "postcode": "PR1",
            "district": "XII",
            "country": "Egyesült Királyság"
        },
        "bank": {
            "iban": "",
            "swift": "",
            "account_no": "12345678-12345678-12345678"
        }
    }
}
```

## Update a client:

```php
\Billingo::clients()->update(int $clientId, array $clientPayload)
```

### Note
On success it returns the modified client object.

### Parameters
- `int $ClientId`: The client id provided by Billingo

### Request
```json
{
    "name": "Gigazoom LLC.",
    "email": "rbrooks5@amazon.com",
    "taxcode": "123456",
    "force": false,
    "billing_address": {
        "street_name": "Moulton",
        "street_type": "Terrace",
        "house_nr": "2797",
        "block": "A",
        "entrance": "B",
        "floor": "3.",
        "door": "17",
        "city": "Preston",
        "postcode": "PR1",
        "district": "XII",
        "country": "United Kingdom"
    },
    "phone": "",
    "bank": {
        "account_no": "12345678-12345678-12345678",
        "iban": "",
        "swift": ""
    },
    "fokonyv_szam": "",
    "type": "2",
    "defaults": {
        "payment_method": "1",
        "electronic_invoice": "0",
        "invoice_due_days": "3",
        "invoice_currency": "HUF",
        "invoice_template_lang_code": "hu"
    }
}
```

### Response 
```json
{
    "id": 1963092040,
    "attributes": {
        "name": "Gigazoom LLC.2",
        "email": "rbrooks5@amazon.com",
        "taxcode": "12345678-0-00",
        "type": 2,
        "fokonyv_szam": "",
        "phone": "00123456789",
        "defaults": {
            "payment_method": "1",
            "electronic_invoice": "0",
            "invoice_due_days": "3",
            "invoice_currency": "HUF",
            "invoice_template_lang_code": "hu"
        },
        "billing_address": {
            "street_name": "Moulton",
            "street_type": "Terrace",
            "house_nr": "2797",
            "block": "A",
            "entrance": "B",
            "floor": "3.",
            "door": "17",
            "city": "Preston",
            "postcode": "PR1",
            "district": "XII",
            "country": "Egyesült Királyság"
        },
        "bank": {
            "iban": "",
            "swift": "",
            "account_no": "12345678-12345678-12345678"
        }
    }
}
```

## Delete a client:

```php
\Billingo::clients()->destroy(int $clientId)
```

### Parameters
- `int $ClientId`: The client id provided by Billingo

### Response
```json
[]
```
