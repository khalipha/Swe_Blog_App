# Swe_Blog_App

# Tech Stack:

Laravel Framework 9.52.16

PHP 8.0.30 (cli) (built: Sep  1 2023 14:15:38)

Xampp Apache (phpmyadmin)

# Setup

run command: git clone https://github.com/khalipha/Swe_Blog_App.git

create database called swe_blog on MYSQL

run command: cd swe_blog

run command: composer update

rename .env.example to .env

configure .env file to include:

DB_DATABASE=swe_blog 

DB_USERNAME=root 

DB_PASSWORD=

run command: php artisan key:generate
run command: php artisan migrate
run command: php artisan serve
Navigate to url: http://127.0.0.1:8000/

# For Errors

NB: For any challenges...run command: npm install && npm run dev


# Features:

(Register - User)

(Login - User)

(Blog Post CRUD)

(Authorization - Only Registered users can perform CRUD on their own blog posts)

(Validation - on Forms)

(Database - Migrations and Relations)

(Factory)

(Test Cases - PhpUnit)
