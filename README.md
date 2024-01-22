## Installation
- Clone the Repo
- Run 'composer install' to install the required packages
- Setup the database
- Copy .env.example to .env and provide the credentials to the database
- Run the Migration: php artisan migrate
- Make sure JWT Key has been generated and stored in .env file - You can create JWT Key using: php artisan jwt:secret
- Run: php artisan serve to run the application
- You can view the API Docs at: http://127.0.0.1:8000/request-docs



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
