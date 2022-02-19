<?php

use Astro\Core\Database\Connection;
use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;
use function DI\factory;

$twigFactory = factory(function(ContainerInterface  $container){
    $loader = new FilesystemLoader($container->get('template_path'));
    return new Environment($loader, [
        'cache' => $container->get('env') === 'prod' ? $container->get('cache_path') : false
    ]);
});

return [
    'env' => ev('APP_ENV', 'debug'),
    'template_path' => BASE_PATH . '/resources/views',
    'cache_path' => BASE_PATH . '/generated/views',
    'routes_path' => BASE_PATH . '/routes/web.php',
    'db_dsn' => 'mysql:host=' . ev('DB_HOST') . ';dbname=' . ev('DB_DATABASE') . ';port=' . ev('DB_PORT') . ';charset=utf8',
    'db_user' => ev('DB_USER'),
    'db_pass' => ev('DB_PASSWORD'),
    Request::class => factory(function () {
        return Request::createFromGlobals();
    }),
    Environment::class => $twigFactory,
    'twig' => $twigFactory,
    'whoops' => factory(function () {
        return new Run();
    }),
    'whoops.page_handler' => factory(function() {
        return new PrettyPageHandler();
    }),
    Connection::class => factory(function (ContainerInterface $container) {
        $db = new PDO($container->get('db_dsn'), $container->get('db_user'), $container->get('db_pass'));
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return Connection::getInstance($db);
    }),

];