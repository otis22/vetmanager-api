<?php

declare(strict_types=1);

namespace Otis22\VetmanagerApi\Api;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Otis22\VetmanagerApi\Api\HTTP\Headers;
use Psr\Http\Message\ResponseInterface;
use Otis22\VetmanagerApi\Api\HTTP\Query;
use Otis22\VetmanagerApi\Url;

class GetRequest implements Request
{
    /**
     * @var ClientInterface
     */
    private $httpClient;
    /**
     * @var Url
     */
    private $url;
    /**
     * @var Headers
     */
    private $headers;
    /**
     * @var Query
     */
    private $query;

    /**
     * GetRequest constructor.
     * @param ClientInterface $httpClient
     * @param Url $url
     * @param Headers $headers
     * @param Query $query
     */
    public function __construct(ClientInterface $httpClient, Url $url, Headers $headers, Query $query)
    {
        $this->httpClient = $httpClient;
        $this->url = $url;
        $this->headers = $headers;
        $this->query = $query;
    }


    /**
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function response(): ResponseInterface
    {
        return $this->httpClient->request(
            "GET",
            $this->url->asString(),
            [
                'query' => $this->query->asAssoc(),
                'headers' => $this->headers->asAssoc()
            ]
        );
    }
}
