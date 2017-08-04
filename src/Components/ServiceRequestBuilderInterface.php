<?php
/**
 * Created by PhpStorm.
 * Date: 04.08.2017
 * Time: 14:32
 */

namespace FastMicroKernel\Components;


use Psr\Http\Message\RequestInterface;

interface ServiceRequestBuilderInterface
{
    /**
     * @param string $method
     * @param string $route
     * @return RequestInterface
     */
    public function buildRequest(string $method, string $route): RequestInterface;
}