<?php

namespace Astro\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
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