<?php
/**
 * Created by PhpStorm.
 * Date: 03.08.2017
 * Time: 17:29
 */

namespace AdServer\Engine\Components;


use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface ServiceClient {

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    public function makeRequest(RequestInterface $request): ResponseInterface
}