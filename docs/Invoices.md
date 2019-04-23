# Invoices Service

## Search invoices

[Check out the official documentation](https://billingo.readthedocs.io/en/latest/query/)
```php
\Otisz\Billingo\Services\Invoices::query(array $filter);
```

## Get a listing of invoices

[Check out the official documentation](https://billingo.readthedocs.io/en/latest/invoices/#invoices)
```php
\Otisz\Billingo\Services\Invoices::all(int $page = 1, $maxPerPage = 20);
```

## Create a new invoice

[Check out the official documentation](https://billingo.readthedocs.io/en/latest/invoices/#save-a-new-invoice)
```php
\Otisz\Billingo\Services\Invoices::create(array $invoicePayload);
```

## Find a specified client

[Check out the official documentation](https://billingo.readthedocs.io/en/latest/invoices/#invoices)
```php
\Otisz\Billingo\Services\Invoices::find(int|string $invoiceId);
```

## Create download link

[Check out the official documentation](https://billingo.readthedocs.io/en/latest/invoices/#create-download-link)
```php
\Otisz\Billingo\Services\Invoices::accessCode(int|string $invoiceId, bool $asURL = false);
```

## Generate normal invoice from proforma invoice

[Check out the official documentation](https://billingo.readthedocs.io/en/latest/invoices/#generate-normal-invoice-from-proforma-invoice)
```php
\Otisz\Billingo\Services\Invoices::proformaToNormal(int|string $invoiceId);
```

## Download invoice

[Check out the official documentation](https://billingo.readthedocs.io/en/latest/invoices/#download-invoice)
```php
\Otisz\Billingo\Services\Invoices::download(int|string $invoiceId, resource|string|null $file = null, bool $asResponse = false);
```

## Cancel the invoice

[Check out the official documentation](https://billingo.readthedocs.io/en/latest/invoices/#cancel-the-invoice)
```php
\Otisz\Billingo\Services\Invoices::cancel(int|string $invoiceId);
```

## Send the invoice to the client email address

[Check out the official documentation](https://billingo.readthedocs.io/en/latest/invoices/#send-the-invoice-to-the-client-email-address)
```php
\Otisz\Billingo\Services\Invoices::send(int|string $invoiceId);
```

## Pay the full or partial amount of the invoice

[Check out the official documentation](https://billingo.readthedocs.io/en/latest/invoices/#pay-the-full-or-partial-amount-of-the-invoice)
```php
\Otisz\Billingo\Services\Invoices::pay(int|string $invoiceId, array $payload);
```

## Undo payment of the invoice

[Check out the official documentation](https://billingo.readthedocs.io/en/latest/invoices/#undo-payment-of-the-invoice)
```php
\Otisz\Billingo\Services\Invoices::undoPayment(int|string $invoiceId);
```

## Get the available invoice blocks

[Check out the official documentation](https://billingo.readthedocs.io/en/latest/invoices/#get-the-available-invoice-blocks)
```php
\Otisz\Billingo\Services\Invoices::availableBlocks();
```