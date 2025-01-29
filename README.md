# Subscription Management Application
This is a simple subscription management application that allows customers to sign up, choose a payment plan, and manage their subscriptions. Admins can view, update, deactivate, and delete customer records.

## Features
* Customer Features
  - Sign Up: Customers can sign up with their name, email, and password, can choose a payment plan (monthly or yearly) to complete their registration.
  - Login: Registered customers can log in to the application.

* Admin Features
  - Admin Seeder: A seeder is available to add at least one system admin.
  - Login: Admins can login using email and password.
  - Customer Listing: Admins have a listing page of all customers with a search box to search by customer name or email.
  - Customer Management: Admins can update, deactivate, reactivate, or delete any customer record.
  - Deactivated Customers: Deactivated customers cannot log in to the application.

# Getting Started

## Prerequisites
* PHP 8.0 or higher
* composer
* Mysql

## Installation
Clone the repository:

```sh
git clone https://github.com/yourusername/subscription-app.git
cd subscription-app
```
## Install dependencies:
```sh
composer install
```
## Set up environment variables:
1. Copy the .env.example file to .env:
```sh
cp .env.example .env
```
2. Update the .env file with your database and payment gateway credentials:
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```
## Generate an application key:

```sh
php artisan key:generate
```
## Run migrations and seed the database:

```sh
php artisan migrate --seed
```
## Start the development server:
```sh
php artisan serve
```

## Access the application in your browser:

```sh
http://localhost:8000
```
## Seeding the Admin User
The application includes a seeder to create at least one admin user. Run the following command to seed the admin:

```sh
php artisan db:seed --class=AdminSeeder
```

## Extract adminLTE files
```sh
cd subscription-app/public/admin
> extract dist & plugins 
```