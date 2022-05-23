<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


### Project installaion

- [Install Docker](https://www.docker.com/).
- Using [Passport Authontication](https://laravel.com/docs/9.x/passport).
- Clone the repository by running this command on terminal "git clone https://github.com/tlibrahim/hostelWorld.git".
- Execute terminal command "cd hostelWorld&./vendor/bin/sail up" to run the project on docker.
- Connect with mysql drive by .env cardinal OR with MAMP by adding this line in .env file "DB_SOCKET=/Applications/MAMP/tmp/mysql/mysql.sock" OR your DB unix_socket.
- Open a new terminal tab and run the migration "./vendor/bin/sail php artisan migrate".
- Run DB seed "./vendor/bin/sail php artisan migrate".
- Run Unit Test Cases"./vendor/bin/sail php artisan test".
- Get the [Postman Collection]() in project direction and add it to your workspace.



### Solution Details

I have used the data.json file as an extended service for providing response data, and in validation of request i set the courant date as 2021-04-10 because of all the events at past date already.

I added all the project environment files to make it easier to run the project on docker.

Scenario flow: 
- The unit test is covering all scenario cases.
- At first I should register a new user through the register api route /api/register.
- Login with the user created through login api route /api/login.
- Receive the token from login response and add with headers of route /api/event as 'Authorization' : 'Bearer '.{token}.
- Send event Request with token as last step and update the parameters in the request body.

The Design Patterns using:

- Action
- Strategy








## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
# hostelWorld
