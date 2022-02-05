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

