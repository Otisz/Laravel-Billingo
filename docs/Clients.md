# Clients

Clients object representation.

Read the official [JSON Schema](https://www.billingo.hu/json/schema/client.json).

| Local Doc | Official doc |
| --------- | ------------ |
| [List of clients](#list-of-clients) | [List of clients](https://billingo.readthedocs.io/en/latest/clients/#list-of-clients) |


## List of clients:
```php
\Billingo::clients()->all(int $page = 1, int $maxPerPage = 20)
```

### Params
- `int $page`: Return the given page
- `int $maxPerPage`: Sets the maximum number of results to return. Absolute maximum is 50! (If you set more than 50, it will be set again 50 automatically)

### Response ([JSON Schema](https://www.billingo.hu/json/schema/client.json))
```json
[
    {
        "id":1278331717,
        "attributes":{
            "name":"Gigazoom LLC.",
            "email":"rbrooks5@amazon.com",
            "taxcode":"",
            "type": "",
            "fokonyv_szam": "",
            "phone": "",
            "defaults": {
                "payment_method":"1",
                "electronic_invoice":"0",
                "invoice_due_days":"3",
                "invoice_currency":"HUF",
                "invoice_template_lang_code":"hu"
            },
            "billing_address":{
                "street_name":"Moulton",
                "street_type":"Terrace",
                "house_nr":"2797",
                "block":"",
                "entrance":"",
                "floor":"",
                "door":"",
                "city":"Preston",
                "postcode":"PR1",
                "country":"United Kingdom",
                "district": ""
            },
            "bank":{
                "iban":"",
                "swift":"",
                "account_no":""
            }
        }
    }
]
```

## Find a client:
[Check out the official documentation](https://billingo.readthedocs.io/en/latest/clients/#list-of-clients)
```php
\Billingo::clients()->find(int $clientId)
```

### Params
- `int $clientId`: The client id provided by Billingo

### Response ([JSON Schema](https://www.billingo.hu/json/schema/client.json))
```json
[
    {
        "id": 1278331717,
        "attributes":{
            "name":"Gigazoom LLC.",
            "email":"rbrooks5@amazon.com",
            "taxcode":"",
            "type": "",
            "fokonyv_szam": "",
            "phone": "",
            "defaults": {
                "payment_method":"1",
                "electronic_invoice":"0",
                "invoice_due_days":"3",
                "invoice_currency":"HUF",
                "invoice_template_lang_code":"hu"
            },
            "billing_address":{
                "street_name":"Moulton",
                "street_type":"Terrace",
                "house_nr":"2797",
                "block":"",
                "entrance":"",
                "floor":"",
                "door":"",
                "city":"Preston",
                "postcode":"PR1",
                "country":"United Kingdom",
                "district": ""
            },
            "bank":{
                "iban":"",
                "swift":"",
                "account_no":""
            }
        }
    }
]
```












## Create a client:
[Official documentation](https://billingo.readthedocs.io/en/latest/clients/#create-a-client)
```php
\Billingo::clients()->create(array $clientPayload)
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