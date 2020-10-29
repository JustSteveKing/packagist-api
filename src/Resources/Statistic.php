<?php declare(strict_types=1);

namespace JustSteveKing\Packagist\SDK\Resources;

use JustSteveKing\PhpSdk\Resources\AbstractResource;

class Statistic extends AbstractResource
{
    /**
     * @var string
     */
    protected string $path = 'statistics.json';

    /**
     * @return object|null
     */
    public function fetch():? object
    {
        return json_decode($this->get()->getBody()->getContents());
    }
}
