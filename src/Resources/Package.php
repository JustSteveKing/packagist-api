<?php declare(strict_types=1);

namespace JustSteveKing\Packagist\SDK\Resources;

use JustSteveKing\PhpSdk\Resources\AbstractResource;

class Package extends AbstractResource
{
    /**
     * @var string
     */
    protected string $path = 'packages/list.json';

    /**
     * @param string $vendor
     * @return object|null
     */
    public function vendor(string $vendor):? object
    {
        $this->uri()->addQuery("vendor={$vendor}");

        return json_decode($this->get()->getBody()->getContents());
    }

    /**
     * @param string $type
     * @return object|null
     */
    public function type(string $type):? object
    {
        $this->uri()->addQuery("type={$type}");

        return json_decode($this->get()->getBody()->getContents());
    }

    /**
     * @param string $query
     * @param string|null $package
     * @return object|null
     */
    public function meta(string $query, string $package = null):? object
    {
        if (! is_null($package))
        {
            $query = "{$query}/{$package}";
        }

        $this->uri()->addHost('repo.packagist.org')->addPath("p/{$query}.json");

        return json_decode($this->get()->getBody()->getContents());
    }
}
