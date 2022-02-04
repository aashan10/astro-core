<?php

use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;
use function DI\factory;

return [
    'env' => 'dev',
    'template_path' => BASE_PATH . '/resources/views',
    'cache_path' => BASE_PATH . '/generated/views',
    'routes_path' => BASE_PATH . '/routes/web.php',
    Request::class => factory(function () {
        return Request::createFromGlobals();
    }),
    Environment::class => factory(function (ContainerInterface $container) {
        $loader = new FilesystemLoader($container->get('template_path'));
        return new Environment($loader, [
            'cache' => $container->get('env') === 'prod' ? $container->get('cache_path') : false
        ]);
    }),
    'whoops' => factory(function () {
        return new Run();
    }),
    'whoops.page_handler' => factory(function() {
        return new PrettyPageHandler();
    })

];