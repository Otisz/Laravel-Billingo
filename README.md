# Laravel Imgix

[![Latest Version on Packagist][shield-packagist]][link-packagist]
[![Software License][shield-license]](LICENSE.md)
[![Total Downloads][shield-downloads]][link-packagist]

[Billingo](https://www.billingo.hu) API integration for Laravel.

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

When published, [the `config/billingo.php` config](config/imgix.php) file contains:

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
    
## Usage

    
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