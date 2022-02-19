<?php

namespace Astro\Controller\Auth;

use Astro\Controller\Controller;
use Astro\Exceptions\NotFoundException;
use Astro\Model\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{

    public function register(): Response
    {
        return $this->render('pages.auth.register');
    }

    public function storeUser(Request $request, User $user)
    {
        $params = $request->request->all();

        try {
            $userExists = $user->find($params['email'], 'email');
            return "User already exists";
        } catch(NotFoundException $e) {

            $data = [
                'first_name' => $params['firstName'],
                'last_name' => $params['lastName'],
                'email' => $params['email'],
                'password' => md5($params['password']),
            ];

            $userObject = $user->create($data);

            dd($userObject);
        }


    }

}