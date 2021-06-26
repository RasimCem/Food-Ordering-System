# Laravel Rest API Food Ordering System

---
## Description
### This project is a simple version of food ordering system. This application will allow users to order their food. Restaurant managers will be able to manage their restaurants. Also admins will be follow the status flow, and interfere if it is neccessary. 
### Laravel Passport is used for backend operations while Vuejs and tailwind-css are used for the front-end operations.

## Getting Started
### This application deveoped as a Rest API. Customers can order a food from the restaurants and they can make the payment by diffrent methods. After customers order their menu, they can follow order status by the application. Also the customers can make the comments express their thoughts about the restaurant and meal. Restaurant Managers can add,update and delete new menu for their own restaurant. The Managers can add slider images to their restaurant profile to make view unique. Also they can get new orders and display monthly numbers of the order they get in a chart. Admins can create restaurants and they can assign managers to the restaurants. After restaurant manager created, the temporary password will be send to the manager by email. These are only main functions of the program. There are so much more properties in the application.


## Visuals

### Home Page
![img_1.png](/public/images/home-page.jpg)

### Cart Page
![img_2.png](/public/images/cart-page.jpg)

### Restaurant Menu Page
![img_3.png](/public/images/restaurant-menus-page.jpg)

### Profile Page
![img_4.png](/public/images/profile-page.jpg)

---

## Installiation
#### Clone The Application
``` 
    git clone https://github.com/RasimCem/Food-Ordering-System.git
    cd Food-Ordering-System
```
#### Install Composer
``` 
   composer install
```
#### Install Passport
``` 
   composer require laravel/passport
```
#### After this step, do not forget to update your .env file. Rename the .env.example to "env" and complete your database information. Also create your database.
#### Migrate Tables
``` 
   php artisan migrate
```
#### Create Your Encryption Keys
``` 
   php artisan passport:install
```
#### Run Seeder to create Admin Account
``` 
   php artisan make:seeder AdminSeeder
```
#### Generate App Key
``` 
    php artisan key:generate
```
#### Run Laravel 
``` 
   php artisan serve
```

#### Laravel API is ready. Lets run the Vue.js now.

#### install npm
``` 
    npm install
```
#### Run npm
``` 
    npm run watch
```
