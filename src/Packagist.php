<?php declare(strict_types=1);

namespace JustSteveKing\Packagist\SDK;

use DI\Container;
use JustSteveKing\Packagist\SDK\Resources\Advisories;
use JustSteveKing\Packagist\SDK\Resources\Search;
use JustSteveKing\Packagist\SDK\Resources\Statistic;
use JustSteveKing\PhpSdk\Client;
use JustSteveKing\UriBuilder\Uri;
use JustSteveKing\HttpSlim\HttpClient;
use JustSteveKing\PhpSdk\ClientBuilder;
use Symfony\Component\HttpClient\Psr18Client;
use JustSteveKing\Packagist\SDK\Resources\Package;
use JustSteveKing\HttpAuth\Strategies\NullStrategy;

class Packagist extends Client
{
    /**
     * Packagist constructor.
     * @param string $url
     */
    public function __construct(string $url = 'https://packagist.org')
    {
        parent::__construct(new ClientBuilder(
            Uri::fromString($url),
            HttpClient::build(
                new Psr18Client(), // http client (psr-18)
                new Psr18Client(), // request factory (psr-17)
                new Psr18Client() // stream factory (psr-17)
            ),
            new NullStrategy(),
            new Container() // container (psr-11)
        ));
    }

    /**
     * @param string $url
     * @return self
     */
    public static function connect(string $url = 'https://packagist.org'): self
    {
        $client = new self($url);

        // Add Resources
        $client->addResource('advisories', new Advisories());
        $client->addResource('statistics', new Statistic());
        $client->addResource('packages', new Package());
        $client->addResource('search', new Search());

        return $client;
    }
}
