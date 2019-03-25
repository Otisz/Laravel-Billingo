# Laravel Billingo

[![Latest Version on Packagist][shield-packagist]][link-packagist]
[![Software License][shield-license]](LICENSE.md)
[![Total Downloads][shield-downloads]][link-packagist]

[Billingo](https://www.billingo.hu) API integration for Laravel.

## Roadmap
- [x] Implement invoices service (2019. 03. 25)
- [ ] Implement products service
- [ ] Implement expenses service
- [ ] Implement recurring service
- [ ] Implement bank accounts service
- [ ] Implement payment methods service
- [ ] Implement vat service
- [ ] Implement currency service
- [x] Refactor documents of services (2019. 03. 25)

## Dependencies

- [PHP](https://secure.php.net): ^7.1
- [illuminate/support](https://github.com/illuminate/support): ^5.0
- [voov/billingo-api-connector](https://github.com/voov/Billingo-API-Connector): ^1.1

## Install

You can install the package via [Composer](https://getcomposer.org/)
```bash
$ composer require otisz/laravel-billingo
```

In Laravel 5.5 or above the service provider will automatically get registered. In older versions of the framework just add the service provider in `config/app.php` file:
```php
'providers' => [
    ...
    Otisz\Billingo\Providers\ServiceProvider::class,
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
$ php artisan vendor:publish --tag=Billingo
```

When published, [the `config/billingo.php` config](config/billingo.php) file contains:

```php
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

### Clients
[Check out Clients.md](docs/Clients.md)

### Invoices
[Check out Invoices.md](docs/Invoices.md)

### Non implemented API features

As you can see in the roadmap, there are some API endpoints that are not yet supported by the package. \
These will be implemented later in minor versions.

If you need any of these, feel free to use Billingo facade.

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