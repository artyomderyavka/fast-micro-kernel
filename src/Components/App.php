<?php


namespace FastMicroKernel\Components;


use GuzzleHttp\Psr7\ServerRequest;
use Psr\Container\ContainerInterface;

class App
{
    /**
     * @var Router
     */
    protected static $router;

    /**
     * @var ContainerInterface
     */
    protected static $container;

    /**
     * @param array $routesMap
     * @param ContainerInterface $container
     */
    public static function run(
        array $routesMap,
        ContainerInterface $container
    )
    {
        self::$router = new Router(
            $routesMap,
            $container
        );;
        self::$container = $container;

        $response = self::$router->handle(ServerRequest::fromGlobals());
        \Http\Response\send($response);
    }

    /**
     * @return Router
     */
    public static function getRouter() : Router
    {
        return self::$router;
    }

    /**
     * @return ContainerInterface
     */
    public static function getContainer() : ContainerInterface
    {
        return self::$container;
    }
}