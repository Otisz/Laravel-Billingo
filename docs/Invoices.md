# Invoices

JSON schemas:

 - [Invoice](https://www.billingo.hu/json/schema/invoice.json)
 - [Invoice items](https://www.billingo.hu/json/schema/invoice_item.json)
 - [Invoice payment](https://www.billingo.hu/json/schema/invoice_pay.json)

| Local Doc | Official doc |
| --------- | ------------ |
| [Search invoices](#search-invoices) | [Search invoices](https://billingo.readthedocs.io/en/latest/query) |
| [List of invoices](#list-of-invoices) | [List of invoices](https://billingo.readthedocs.io/en/latest/invoices/#invoices) |


| [Find a client](#find-a-client) | [Find a client](https://billingo.readthedocs.io/en/latest/clients/#list-of-clients) |
| [Create a client](#create-a-client) | [Create a client](https://billingo.readthedocs.io/en/latest/clients/#create-a-client) |
| [Update a client](#update-a-client) | [Update a client](https://billingo.readthedocs.io/en/latest/clients/#update-a-client) |
| [Delete a client](#delete-a-client) | [Delete a client](https://billingo.readthedocs.io/en/latest/clients/#delete-client) |

## Search invoices

[Check out the official documentation](https://billingo.readthedocs.io/en/latest/query/)
```php
\Billingo::invoices()->query(array $filter);
```

### Parameters
 - `array $filter`
   - `page` (integer, optional, default=1) - If set, return the given page
   - `max_per_page` (integer, optional, default=20) - Sets the maximum number of results to return. Absolute maximum is 50!
   - `start_date` (date, optional, default=first day of month)
   - `end_date` (date, optional, default=current date)
   - `num_start` (integer, optional) - Starting number of the invoice, should not contain year or any other formatting
   - `num_end` (integer, optional) - Ending number of the invoice, should not contain year or any other formatting
   - `year_start` (integer, optional) - Year for num_start parameter
   - `year_end` (integer, optional) - Year for the num_end parameter
   - `payment_method` (integer, optional) - The payment method ID (same ID as used when creating invoices)
   - `block` (integer, optional) - The block ID (same ID as used when creating invoices)

### Response

```json
{
    "id": 1938103373,
    "attributes": {
        "date": "2012-07-30",
        "fulfillment_date": "2012-07-30",
        "due_date": "2015-08-07",
        "invoice_no": "2015-000001",
        "total": "4445.000",
        "total_paid": "0.000",
        "comment": "",
        "currency": "HUF",
        "client_uid": 115387686,
        "block_uid": 0,
        "uid": 1938103373,
        "items": [
            {
                "description": "Teszt Termék",
                "net_unit_price": "3500.000",
                "qty": "1.000",
                "unit": "db",
                "vat_id": "1",
                "item_comment": ""
            }
        ],
        "client": {
            "name": "Gigazoom LLC.",
            "email": "rbrooks5@amazon.com",
            "taxcode": "12345678-2-00",
            "billing_address": {
                "street_name":"Moulton",
                "street_type":"Terrace",
                "house_nr": "2797",
                "block": "",
                "entrance": "",
                "floor": "",
                "door": "",
                "city": "Preston",
                "postcode": "PR1",
                "country": "United Kingdom"
            },
            "bank": {
                "iban": "",
                "swift": "",
                "account_no": ""
            }
        },
        "payment_method": {
            "id": 2,
            "lang_code": "hu",
            "name": "Átutalás",
            "advance_paid": "0"
        }
    }
}
```

## List of invoices

```php
\Billingo::invoices()->all(int $page = 1, $maxPerPage = 20);
```

### Parameters
- `int $page`: Return the given page
- `int $maxPerPage`: Sets the maximum number of results to return. Absolute maximum is 50! (If you set more than 50, it will be set again 50 automatically)

### Response

```json

```

## Create a new invoice

[Check out the official documentation](https://billingo.readthedocs.io/en/latest/invoices/#save-a-new-invoice)
```php
\Billingo::invoices()->create(array $invoicePayload);
```

## Find a specified client

[Check out the official documentation](https://billingo.readthedocs.io/en/latest/invoices/#invoices)
```php
\Billingo::invoices()->find(int $invoiceId);
```

## Create download link

[Check out the official documentation](https://billingo.readthedocs.io/en/latest/invoices/#create-download-link)
```php
\Billingo::invoices()->accessCode(int $invoiceId, bool $asURL = false);
```

## Generate normal invoice from proforma invoice

[Check out the official documentation](https://billingo.readthedocs.io/en/latest/invoices/#generate-normal-invoice-from-proforma-invoice)
```php
\Billingo::invoices()->proformaToNormal(int $invoiceId);
```

## Download invoice

[Check out the official documentation](https://billingo.readthedocs.io/en/latest/invoices/#download-invoice)
```php
\Billingo::invoices()->download(int $invoiceId, resource|string|null $file = null, bool $asResponse = false);
```

## Cancel the invoice

[Check out the official documentation](https://billingo.readthedocs.io/en/latest/invoices/#cancel-the-invoice)
```php
\Billingo::invoices()->cancel(int $invoiceId);
```

## Send the invoice to the client email address

[Check out the official documentation](https://billingo.readthedocs.io/en/latest/invoices/#send-the-invoice-to-the-client-email-address)
```php
\Billingo::invoices()->send(int $invoiceId);
```

## Pay the full or partial amount of the invoice

[Check out the official documentation](https://billingo.readthedocs.io/en/latest/invoices/#pay-the-full-or-partial-amount-of-the-invoice)
```php
\Billingo::invoices()->pay(int $invoiceId, array $payload);
```

## Undo payment of the invoice

[Check out the official documentation](https://billingo.readthedocs.io/en/latest/invoices/#undo-payment-of-the-invoice)
```php
\Billingo::invoices()->undoPayment(int $invoiceId);
```

## Get the available invoice blocks

[Check out the official documentation](https://billingo.readthedocs.io/en/latest/invoices/#get-the-available-invoice-blocks)
```php
\Billingo::invoices()->availableBlocks();
```
