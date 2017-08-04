<?php


namespace FastMicroKernel\Components;


use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ServiceClientRest implements ServiceClientInterface
{
    protected $prefix;

    /**
     * @param string $prefix
     */
    public function __construct(string $prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * @param RequestInterface $request
     */
    public function makeRequest(RequestInterface $request): ResponseInterface
    {
        //@todo
        exit("Rest client is not implemented yet. Please switch to local client");
    }
}
