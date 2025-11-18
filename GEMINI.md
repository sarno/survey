# GEMINI.md

This file provides a comprehensive overview of the project, its structure, and how to work with it.

## Project Overview

This is a Laravel-based survey application built using the Filament admin panel. Filament provides the entire user interface for managing survey-related data. The frontend is built with Vite, Tailwind CSS, and Prettier.

The core of the application is located in the `app/Filament` directory, which contains the Filament resources, pages, and widgets that define the application's functionality.

## Building and Running

### Prerequisites

*   PHP >= 8.2
*   Composer
*   Node.js
*   npm

### Installation

1.  Clone the repository.
2.  Install PHP dependencies: `composer install`
3.  Install frontend dependencies: `npm install`
4.  Create a `.env` file by copying `.env.example`: `cp .env.example .env`
5.  Generate an application key: `php artisan key:generate`
6.  Run database migrations: `php artisan migrate`

### Running the Application

To run the development server, which includes the Laravel server, queue worker, log watcher, and Vite server, use the following command:

```bash
composer run dev
```

### Running Tests

To run the test suite, use the following command:

```bash
composer run test
```

## Development Conventions

### Code Style

This project uses `laravel/pint` for PHP code style and `prettier` for frontend code style.

To format your PHP code, run:

```bash
./vendor/bin/pint
```

To format your frontend code, run:

```bash
npm run format
```

### Database Migrations

Database schema changes are managed through Laravel's migration system. To create a new migration, use the following Artisan command:

```bash
php artisan make:migration <migration_name>
```

### Filament Resources

The application's main functionality is built using Filament resources. These resources define the models, forms, and tables used to manage the survey data. You can find the resources in the `app/Filament/Resources` directory.
