<?php declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use JustSteveKing\Packagist\SDK\Packagist;

$packagist = Packagist::connect();

dump($packagist->search->where('q', 'JustSteveKing')->where('type', 'library')->fetch());

dump($packagist->packages->vendor('JustSteveKing'));

dump($packagist->packages->meta('juststeveking', 'php-sdk'));

dump($packagist->statistics->fetch());

dump($packagist->advisories->package('slim', 'slim'));
