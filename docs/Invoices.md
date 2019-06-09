# Invoices Service

## Search invoices

[Check out the official documentation](https://billingo.readthedocs.io/en/latest/query/)
```php
\Billingo::invoices()->query(array $filter);
```

## Get a listing of invoices

[Check out the official documentation](https://billingo.readthedocs.io/en/latest/invoices/#invoices)
```php
\Billingo::invoices()->all(int $page = 1, $maxPerPage = 20);
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