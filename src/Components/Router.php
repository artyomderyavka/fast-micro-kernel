<?php


namespace AdServer\Engine\Components;


use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use Psr\Container\ContainerInterface;
use \GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class Router
{
    protected $dispatcher;

    protected $container;

    /**
     * @param array $routesMap
     * @param ContainerInterface $container
     */
    public function __construct(array $routesMap, ContainerInterface $container)
    {
        $this->setDispatcher($routesMap);
        $this->container = $container;
    }

    /**
     * @param RequestInterface $request
     */
    public function handle(RequestInterface $request) : ResponseInterface
    {
        $routeInfo = $this->dispatcher->dispatch($request->getMethod(), $request->getUri()->getPath());
        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                $response = new Response(404);
                break;
            case Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                $response = new Response(405);
                break;
            case Dispatcher::FOUND:
                $response = $this->runController($routeInfo, $request);
                break;
        }

        return $response;
    }

    /**
     * @param array $routesMap
     */
    protected function setDispatcher(array $routesMap)
    {
        $routes = $routesMap['routes'];
        $cacheFile = $routesMap['cacheFile'];

        $this->dispatcher = \FastRoute\cachedDispatcher(function(RouteCollector $routeCollector) use ($routes, $cacheFile) {
            $loader = new YamlRoutesLoader($routeCollector);
            foreach ($routes as $route) {
                $loader->loadRoutes($route['routesFilePath'], $route['routesPrefix']);
            }
        }, ['cacheFile' => $cacheFile]
        );
    }

    protected function runController($routeInfo, RequestInterface $request) : ResponseInterface
    {
        $handler = $routeInfo[1];
        $arguments = $routeInfo[2];

        $class = $handler['controller'];
        $method = $handler['action'];

        if (!empty($handler['before'])) {
            $this->container->get($handler['before']['middlware'])
                ->process($request, $this->container->get($handler['before']['delegate']));
        }

        return (new $class)->$method($request, $arguments);
    }
}