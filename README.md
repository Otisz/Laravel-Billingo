# Laravel Billingo

[![Latest Version on Packagist][shield-packagist]][link-packagist]
[![Software License][shield-license]](LICENSE.md)
[![Total Downloads][shield-downloads]][link-packagist]

[Billingo](https://www.billingo.hu) API integration for Laravel.

## Roadmap
- [x] Implement invoices service (2019. 03. 25.)
- [x] Refactor documents of services (2019. 03. 25.)
- [x] Use custom connector package (2019. 04. 17.)
- [x] Implement products service (2019. 05. 31.)
- [x] Implement expenses service (2019. 05. 31.)
- [x] Implement recurring service (2019. 05. 31.)
- [x] Implement bank accounts service (2019. 05. 31.)
- [x] Implement payment methods service (2019. 05. 31.)
- [x] Implement vat service (2019. 05. 31.)
- [x] Implement currency service (2019. 05. 31.)
- [ ] Add further docs

## Dependencies

- [PHP](https://secure.php.net): ^7.1
- [illuminate/support](https://github.com/illuminate/support): ^5.0

## Install

You can install the package via [Composer](https://getcomposer.org/)
```bash
$ composer require otisz/laravel-billingo
```

In Laravel 5.5 or above the service provider will automatically get registered. In older versions of the framework just add the service provider in `config/app.php` file:
```php
'providers' => [
    ...
    Otisz\Billingo\BillingoServiceProvider::class,
    ...
],

'aliases' => [
    ...
    'Billingo' =>  Otisz\Billingo\Facades\Billingo::class,
    ...
],
```

You can publish the config file with:
```bash
$ php artisan vendor:publish --provider="Otisz\Billingo\BillingoServiceProvider" --tag=config
```

When published, [the `config/billingo.php` config](config/billingo.php) file contains:

```php
<?php

return [
    /*
     * The public key for Billingo
     */
    'public_key' => env('BILLINGO_PUBLIC_KEY'),

    /*
     * Private key
     */
    'private_key' => env('BILLINGO_PRIVATE_KEY'),
];
```

## Config

Before you can use the Billingo service provider you have configure it with your API keys. You can access your API keys here: [https://www.billingo.hu/api](https://www.billingo.hu/api).
    
## Usage

- Clients (outdated) [Check out Clients.md](docs/Clients.md)
- Invoices (outdated) [Check out Invoices.md](docs/Invoices.md)
- Products (coming soon)
- Bank accounts (coming soon)
- Currency (coming soon)
- Expenses (coming soon)
- Payment methods (coming soon)
- Recurring (coming soon)
- Vat (coming soon)

```php
\Billingo::get(string $uri, array $payload = []);

\Billingo::post(string $uri, array $payload = []);

\Billingo::put(string $uri, array $payload = []);

\Billingo::delete(string $uri, array $payload = []);
```
    
## Testing

``` bash
$ composer lint
```

## Contributing

### Security

If you discover any security-related issues, please email [leventeotta@gmail.com](mailto:leventeotta@gmail.com) instead of using the issue tracker.

## Licence

The MIT Licence (MIT). Please see [License File](LICENSE.md) for more information.

[shield-packagist]: https://img.shields.io/packagist/v/otisz/laravel-billingo.svg?style=flat-square
[shield-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[shield-downloads]: https://img.shields.io/packagist/dt/otisz/laravel-billingo.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/otisz/laravel-billingo