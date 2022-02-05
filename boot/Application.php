<?php

use Astro\Exceptions\InvalidHttpMethodCallException;
use Astro\Exceptions\RouteNotFoundException;
use DI\Container;
use DI\ContainerBuilder;
use Dotenv\Dotenv;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Whoops\Handler\Handler;
use Whoops\Run;

class Application
{
    /**
     * @var Container
     */
    protected $container;
    /**
     * @var Collection
     */
    protected $routes;

    /**
     * @var Request
     */
    protected $request;

    public function __construct()
    {
        $this->initializeEnvironment();
        $this->initializeContainer();
        $this->initializePrettyErrors();
        $this->initializeRequest();
    }

    protected function initializeContainer()
    {
        $containerBuilder = new ContainerBuilder();
        $containerBuilder->addDefinitions(BASE_PATH . '/config/app.php');
        $containerBuilder->enableCompilation(BASE_PATH . '/generated');
        $containerBuilder->writeProxiesToFile(true, BASE_PATH . '/generated/proxies');

        $this->container = $containerBuilder->build();
    }

    protected function initializePrettyErrors()
    {
        $whoops = $this->container->get('whoops');
        $whoops->pushHandler($this->container->get('whoops.page_handler'));
        $whoops->register();
    }


    /**
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $this->initializeRoutes();
        try {
            $activeRoute = $this->getActiveRoute();
            [
                'controller' => $controllerName,
                'method' => $methodName
            ] = $activeRoute['action'];

            $controller = $this->container->get($controllerName);
            return $this->container->call([$controller, $methodName]);
        } catch (Exception $e) {
            if($e instanceof RouteNotFoundException) {
                $twig = $this->container->get('twig');
                $response  = $this->container->get(Response::class);
                return $response->setContent($twig->render('pages/404.html.twig'))->setStatusCode(404)->send();
            }
            throw $e;
        }
    }

    protected function initializeRoutes()
    {
        if (!$this->routes) {
            $routesPath = $this->container->get('routes_path');
            if (!$routesPath) {
                throw new Exception('Routes not loaded! Please set \'routes_path\' entry in configuration file!');
            }
            $this->routes = collect(include $routesPath);
        }
    }

    protected function getPathInfo(): string
    {
        return $this->request->getPathInfo();
    }

    protected function getActiveRoute(): array
    {
        $pathInfo = $this->getPathInfo();
        $activeRoute = $this->routes->filter(function ($route) use ($pathInfo) {
            return @preg_match($route['path'], $pathInfo);
        });
        if ($activeRoute->count() <= 0) {
            throw new RouteNotFoundException($pathInfo, $this->getActiveMethod());
        }

        $activeRoute = $activeRoute->filter(function ($route) {
            return strtolower($route['method']) === $this->getActiveMethod();
        })->first();
        if (!$activeRoute) {
            throw new InvalidHttpMethodCallException($this->getActiveMethod(), $pathInfo);
        }
        return $activeRoute;
    }

    protected function getActiveMethod(): string
    {
        return strtolower($this->request->getMethod());
    }

    protected function initializeRequest()
    {
        $this->request = $this->container->get(Request::class);
    }

    private function initializeEnvironment()
    {
        $env = Dotenv::createImmutable(BASE_PATH);
        $env->load();
    }
}