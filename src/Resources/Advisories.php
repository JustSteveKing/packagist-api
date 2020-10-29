<?php declare(strict_types=1);

namespace JustSteveKing\Packagist\SDK\Resources;

use JustSteveKing\PhpSdk\Resources\AbstractResource;

class Advisories extends AbstractResource
{
    /**
     * @var string
     */
    protected string $path = 'api/security-advisories/';

    /**
     * @param string $query
     * @param string|null $package
     * @return object|null
     */
    public function package(string $query, string $package = null):? object
    {
        if (! is_null($package)) {
            $query = "{$query}/{$package}";
        }

        return json_decode(
            $this->where('packages[]', $query)->get()->getBody()->getContents()
        );
    }
}
