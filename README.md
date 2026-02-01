# Laravel Book Rental System

Book rental system in Laravel with blade templating and sqlite.

## Description

This project starts from a basic laravel template and implements users, book, genres and borrowing using Eloquent models and creates tables in a sqlite database with migrations. The database is seeded using model factories and seeders. The users have two main roles, reader and librarian, with their own permissions. Each registered user can borrow books, but a librarian has to approve the it, and also may chose to reject it.

The UI is generated using blade templates and styled with Bootstrap 5. Generating the web ui package requires installation of node packages and running install afterwards.

## Versions

- PHP: `v7.4.3`
- Composer: `v2.3.3`
- Laravel: `v8.83.6`

## Scripts

- Install php and composer: `install.sh`
- Generate Laravel project from scratch: `initialize.sh`
- Install dependencies and seed database: `prepare.sh`
- Reset database: `dbreset.sh`

## Usage

### 1. Install dependencies

```bash
composer install
npm install
```

### 2. Generate required assets

```bash
npm run prod
```

### 4. Prepare and seed database

> This step should only be done if you are running a development version.
> Clear database before deployment!

```bash
php artisan migrate:fresh
php artisan db:seed
```

### 5. Start the server

```bash
php artisan serve
```

### 6. Navigate to local server

> Note: the port should be visible after running step 5.

[http://127.0.0.1:8000](http://127.0.0.1:8000)

## Useful commands

### Create a new model with all components

```bash
php artisan make:model MODELNAME -a
```

### Quick reset database

```bash
./dbreset.sh
```
