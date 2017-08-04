<?php


namespace FastMicroKernel\Components;


use Psr\Container\ContainerInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Psr7\Response;

class Controller implements ControllerInterface
{
    /**
     * @return ContainerInterface
     */
    public function getContainer() : ContainerInterface
    {
        return App::getContainer();
    }

    /**
     * @param int $status
     * @param \StdClass $responseDataObject
     * @return Response
     */
    public function buildJsonResponse(int $status, \StdClass $responseDataObject): Response
    {
        return new Response(
            $status,
            ['Content-Type' => 'application/json'],
            json_encode($responseDataObject)
        );
    }
}