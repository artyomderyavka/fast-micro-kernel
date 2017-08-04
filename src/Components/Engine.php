<?php


namespace AdServer\Engine\Components;


use GuzzleHttp\Psr7\ServerRequest;
use Psr\Container\ContainerInterface;

class Engine
{
    protected static $router;
    protected static $container;

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

    public static function getRouter() : Router
    {
        return self::$router;
    }

    public static function getContainer() : ContainerInterface
    {
        return self::$container;
    }
}