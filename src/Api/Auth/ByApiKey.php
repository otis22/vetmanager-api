<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api\Auth;

use Otis22\VetmanagerApi\Api\Auth;

final class ByApiKey implements Auth
{
    /**
     * @var ApiKey
     */
    private $apiKey;

    /**
     * ApiKeyAuth constructor.
     * @param ApiKey $apiKey
     */
    public function __construct(ApiKey $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function asAssoc(): array
    {
        return [
            'X-REST-API-KEY' => strval($this->apiKey)
        ];
    }
}
