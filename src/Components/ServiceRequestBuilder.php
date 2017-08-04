<?php
/**
 * Created by PhpStorm.
 * Date: 04.08.2017
 * Time: 14:37
 */

namespace FastMicroKernel\Components;


use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Psr7\Request;

class ServiceRequestBuilder implements ServiceRequestBuilderInterface
{
    /**
     * @param string $method
     * @param string $route
     * @return RequestInterface
     */
    public function buildRequest(string $method, string $route): RequestInterface
    {
        return new Request($method, $route);
    }
}