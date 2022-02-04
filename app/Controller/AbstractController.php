<?php

namespace Astro\Controller;


use DI\Container;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

abstract class AbstractController
{
    /**
     * @var Container
     */
    private $container;

    private $twig;

    public function __construct(Container $container, Environment $twig)
    {
        $this->container = $container;
        $this->twig = $twig;
    }

    /**
     * @return Container
     */
    protected function getContainer(): Container
    {
        return $this->container;
    }

    protected function render(string $template, array $arguments = [], int $responseCode = 200): Response
    {
        $template = str_replace('.', '/', $template);
        $template .= '.html.twig';
        $responseContent = $this->twig->render($template, array_merge($arguments, $this->prepareViewData()));
        return (new Response($responseContent, $responseCode))->send();
    }

    protected function prepareViewData(): array
    {
        return [];
    }

}
