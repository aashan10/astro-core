<?php

namespace Astro\Controller\Auth;

use Astro\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{

    public function register(): Response
    {
        return $this->render('pages.auth.register');
    }

}