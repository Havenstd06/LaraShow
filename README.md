# LaraShow
## A Laravel project with the TMDB API
  
<img src="https://limg.app/i/Brave-Boar-Fluffy-Zombie-Explorer-KvbFij.png/500">
  
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>

<hr>

## Requirement
- [**PHP**](https://php.net) 7.2+ (**7.4** preferred)
- [Composer](https://getcomposer.org)
- [Node.js](https://nodejs.org/) with npm

## Installation
* clone the repository: `git clone https://github.com/Havenstd06/LaraShow`
* create a database
* install: `composer install`
* Set your `TMDB_TOKEN` in your `.env` file. You can get an API key [here](https://www.themoviedb.org/settings/api). Make sure to use the "API Read Access Token (v4 auth)" from the TMDb dashboard.
* create configuration env file `.env` refer to `.env.example`
* generate a new application key `php artisan key:generate`
* install node_module `npm i && npm run dev` (or npm run prod)

Projet réalisé depuis le tutoriel de [drehimself](https://github.com/drehimself/laravel-movies-example)  

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.
Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)