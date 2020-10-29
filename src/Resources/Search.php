<?php declare(strict_types=1);

namespace JustSteveKing\Packagist\SDK\Resources;

use JustSteveKing\PhpSdk\Resources\AbstractResource;

class Search extends AbstractResource
{
    /**
     * @var string
     */
    protected string $path = 'search.json';

    /**
     * @return array|null
     */
    public function fetch():? object
    {
        $response = $this->get()->getBody()->getContents();

        return json_decode($response);
    }
}