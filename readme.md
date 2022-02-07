## Astro Stack
Astro is a collection of cool components for fullstack development. 
It is an opinionated set of components for full stack web app development using PHP and JS.
Under the hood, it uses components from symfony, laravel, php-di, and so on to create 
a laravel inspired backend. At the moment, it does not have a command line interface, but feel free to contribute.

It has a very opinionated frontend stack with tailwindcss and react at the heart of everything.
It uses laravel mix to build the frontend assets. For server side templates, it uses twig as templating engine.

### Installation

- Clone the repository
- Copy the `.env.example` file to `.env`
- Run `composer install`
- Run `yarn`
- Run `yarn watch` to build frontend assets
- Inside the `public` directory, run `php -S localhost:8080` to start the development server.

### Routing

The routing is currently handled by `routes/web.php` file. However, it can be customized by modifying the `routes_path` config file under `config/app.php`.
The routes file returns an array of routes which is then resolved by the application.
Each route entry should have the following structure.

```php
 
 ​    ​'home'​ => [ // name of the route
 ​        ​'path'​ => ​'/^\/$/'​, // regular expression that matches the route
 ​        ​'url'​ => ​'/'​, // the actual url that will be resolved
 ​        ​'action'​ => [ 
 ​            ​'controller'​ => ​HomeController​::class, // fully qualified class name of the controller responsible for handling the route
 ​            ​'method'​ => ​'index' // name of method responsible for handling the request
 ​        ], 
 ​        ​'method'​ => ​'GET'​, // the http method of route
 ​    ],

```
