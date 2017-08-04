<?php


namespace AdServer\Engine\Components;


use Psr\Container\ContainerInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use \GuzzleHttp\Psr7\Response;
use \GuzzleHttp\Psr7\Request;

class Controller implements ControllerInterface
{
    public function getContainer() : ContainerInterface
    {
        return Engine::getContainer();
    }

    public function buildJsonResponse($status, $responseDataObject)
    {
        return new Response(
            $status,
            ['Content-Type' => 'application/json'],
            json_encode($responseDataObject)
        );
    }

    public function buildRequest(string $method, string $route): RequestInterface
    {
        return new Request($method, $route);
    }
}