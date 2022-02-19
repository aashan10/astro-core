<?php

namespace Astro\Controller;

use Astro\Model\Student;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{

    public function index(Request $request, Student $student): Response
    {
        $student->create([
            'name' => 'Sarita',
            'roll_no' => 123,
            'class' => 123
        ]);
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

    public function aboutUs(): Response
    {
        return $this->render('pages.about-us');
    }

}