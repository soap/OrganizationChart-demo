[![Laravel](https://github.com/soap/OrganizationChart-demo/actions/workflows/laravel.yml/badge.svg)](https://github.com/soap/OrganizationChart-demo/actions/workflows/laravel.yml)

## About Organization Chart Demo
Demonstrate of how to manager employee organization units using Laravel.
 - Departments or Organization units store as MPTT.
 - Employee can be in more than one unit.
 - Employee role in unit can be Head, Assistant or Member.
 - Display organization units as a file/folder view.
 - Organization display as a tree view is a plan.

## How to Run
- clone this git repository.
- change directory to application folder.
- copy .env.example to .env file.
- create database and put details in .env file.
- run composer install and npm install.
- migrate database
```
    php artisan migrate
```
- seed database for example data
```
    php artisan db:seed
```

Run test using 
- all test
```
    php artisan test 
```
- specify test suit
```
    php artisan test --testsuit=Feature
```
- specify class
```
    php artisan test --filter=RegistrationTest
```

## Contributing

Thank you for considering contributing to the Organization Chart Demo! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the the following Code of Conduct: 

This code of conduct is Laravel code of conduct. 

- Participants will be tolerant of opposing views.
- Participants must ensure that their language and actions are free of personal attacks and disparaging personal remarks.
- When interpreting the words and actions of others, participants should always assume good intentions.
- Behavior that can be reasonably considered harassment will not be tolerated.

## Security Vulnerabilities

If you discover a security vulnerability within Application, please send an e-mail to Prasit Gebsaap via [prasit.gebsaap@gmail.com](mailto:prasit.gebsaap@gmail.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
