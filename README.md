# Laravel Book Rental System

This is a sample project showcasing a simple book rental system in PHP Laravel.

## Description

This project starts from a basic laravel template and implements users, book, genres and borrowing using Illuminate models and creates tables in a sqlite database with migrations. The database is seeded using model factories and seeders. The users have two main roles, reader and librarian, with their own permissions.

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
