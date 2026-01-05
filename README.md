<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Rekam Medis
ehe,alo

This is a Medical Record management system built with the Laravel framework. It provides role-based access for different users like Admin, Doctor, and Pharmacist.

- **Framework**: [Laravel 12](https://laravel.com)
- **Authentication**: [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze)
- **Frontend**: Blade, Tailwind CSS, Vite

## Getting Started

### Prerequisites

- PHP >= 8.2
- Composer
- Node.js & NPM
- A database server (e.g., MySQL, PostgreSQL)

### Installation

1.  Clone the repository:
    ```sh
    git clone https://github.com/your-username/rekam_medis.git
    cd rekam_medis
    ```
2.  Install Composer dependencies:
    ```sh
    composer install
    ```
3.  Install NPM dependencies:
    ```sh
    npm install
    ```
4.  Create a copy of your `.env` file:
    ```sh
    cp .env.example .env
    ```
5.  Generate an application key:
    ```sh
    php artisan key:generate
    ```
6.  Configure your database in the `.env` file.
7.  Run the database migrations:
    ```sh
    php artisan migrate
    ```
8.  (Optional) Seed the database with initial data:
    ```sh
    php artisan db:seed
    ```
9. Build frontend assets:
    ```sh
    npm run build
    ```
10. Start the development server:
    ```sh
    php artisan serve
    ```
And in a separate terminal, run the Vite dev server:
    ```sh
    npm run dev
    ```

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT). This project, Rekam Medis, is also licensed under the MIT license.
