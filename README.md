# Packagist SDK

<!-- BADGES_START -->
[![Latest Version][badge-release]][packagist]
[![PHP Version][badge-php]][php]
![tests](https://github.com/JustSteveKing/packagist-api/workflows/tests/badge.svg)
![Check & fix styling](https://github.com/JustSteveKing/packagist-api/workflows/Code%20style/badge.svg)
[![Total Downloads][badge-downloads]][downloads]

[badge-release]: https://img.shields.io/packagist/v/juststeveking/packagist-sdk.svg?style=flat-square&label=release
[badge-php]: https://img.shields.io/packagist/php-v/juststeveking/packagist-sdk.svg?style=flat-square
[badge-downloads]: https://img.shields.io/packagist/dt/juststeveking/packagist-sdk.svg?style=flat-square&colorB=mediumvioletred

[packagist]: https://packagist.org/packages/juststeveking/packagist-sdk
[php]: https://php.net
[downloads]: https://packagist.org/packages/juststeveking/packagist-sdk
<!-- BADGES_END -->

A dead simple API package for the Packagist API.

## Requirements

- PHP ^7.4

## Installation

```bash
$ composer require juststeveking/packagist-api
```

## Using

### Searching

Thanks to the fluent builder, we can build out search exactly as we need

```php
use JustSteveKing\Packagist\SDK\Packagist;

$packagist = Packagist::connect();
$results = $packagist->search->where('q', 'JustSteveKing')
                ->where('type', 'library')
                ->fetch();
```


## Get packages by vendor

```php
use JustSteveKing\Packagist\SDK\Packagist;

$packagist = Packagist::connect();

$results = $packagist->packages->vendor('JustSteveKing');
```


### Get meta information about a package

```php
use JustSteveKing\Packagist\SDK\Packagist;

$packagist = Packagist::connect();

$result = $packagist->packages->meta('juststeveking', 'php-sdk');
```


### Get Security Advisories about a package

```php
use JustSteveKing\Packagist\SDK\Packagist;

$packagist = Packagist::connect();

$advisories = $packagist->advisories->package('slim', 'slim');
```

### Fetch Packagist statistics

```php
use JustSteveKing\Packagist\SDK\Packagist;

$packagist = Packagist::connect();

$stats = $packagist->statistics->fetch();
```
