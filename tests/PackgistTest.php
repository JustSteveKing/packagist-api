<?php declare(strict_types=1);

namespace JustSteveKing\Packagist\SDK\Tests;

use JustSteveKing\Packagist\SDK\Packagist;
use PHPUnit\Framework\TestCase;

class PackgistTest extends TestCase
{
    /**
     * @test
     */
    public function it_will_create_the_client_correctly()
    {
        $client = Packagist::connect();
        $this->assertInstanceOf(
            Packagist::class,
            $client
        );
        $this->assertEquals(
            'https://packagist.org',
            $client->uri()->toString()
        );

        $client = new Packagist();
        $this->assertInstanceOf(
            Packagist::class,
            $client
        );
        $this->assertEquals(
            'https://packagist.org',
            $client->uri()->toString()
        );
    }

    /**
     * @test
     */
    public function it_will_fetch_statistics_from_the_api()
    {
        $client = Packagist::connect();

        $this->assertIsObject(
            $client->statistics->fetch()
        );
    }

    /**
     * @test
     */
    public function it_will_fetch_search_results_from_the_api()
    {
        $client = Packagist::connect();

        $this->assertIsObject(
            $client->search->where('q', 'phpunit')->fetch()
        );
    }

    /**
     * @test
     */
    public function it_will_fetch_adivisories_from_the_api()
    {
        $client = Packagist::connect();

        $this->assertIsObject(
            $client->advisories->package('phpunit', 'phpunit')
        );
    }

    /**
     * @test
     */
    public function it_will_get_packages_by_vendor()
    {
        $client = Packagist::connect();

        $this->assertIsObject(
            $client->packages->vendor('phpunit')
        );
    }

    /**
     * @test
     */
    public function it_will_get_packages_by_type()
    {
        $client = Packagist::connect();

        $this->assertIsObject(
            $client->packages->type('template')
        );
    }

    /**
     * @test
     */
    public function it_will_get_meta_info_on_a_package()
    {
        $client = Packagist::connect();

        $this->assertIsObject(
            $client->packages->meta('phpunit', 'phpunit')
        );

        $this->assertIsObject(
            $client->packages->meta('phpunit/phpunit')
        );
    }
}
