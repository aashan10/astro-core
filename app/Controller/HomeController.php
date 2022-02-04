<?php

namespace Astro\Controller;

use DI\Container;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{

    public function index(Request $request): Response
    {
        return $this->render('pages.home', [
            'name' => $request->get('name') ?? 'World'
        ]);
    }

    public function about()
    {
        
    }

    public function contact()
    {
        
    }

}