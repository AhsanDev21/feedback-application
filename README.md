<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About MCQ App

In this MCQ (Multiple Choice Questions) management system, administrators can create questions based on their requirements and specify the correct answers. Users can register and sign in. Upon successful login, users can access all the questions and select the correct answers. After submitting the test, users can view the results, including the number of correct answers and the percentage score they achieved. Administrators have access to reports that include user names, email addresses, total marks, and percentages.
Technology stack used ( PHP 8.1, Laravel 10, Breeze.).

## Installation


## Prerequisites (e.g., PHP, Laravel, Composer).
## Step-by-step installation guide.
- Rename .env.example to .env
- composer install
- php artisan migrate
- php artisan db:seed
- npm install
- npm run dev

## Features
- A comprehensive list of features in the MCQ System:
- User Authentication (Breeze)
- Admin Dashboard
- User Registration
- MCQ Question Creation (Admin)
- MCQ Attempt (User)
- MCQ Result Display (User)
- User Listing with Results (Admin)

## Admin Dashboard
- Access and navigate the admin dashboard.
- Use {{base_url}}/admin/login for admin login page.
- Email : admin@gmail.com
- Password : password

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
