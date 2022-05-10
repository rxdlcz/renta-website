<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="#"><img src="https://img.shields.io/badge/Under-Development-red" alt="Build Status"></a>
</p>

# Renta Website
   Endorsing apartment
 
# Language

 ![](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
 ![](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
 ![](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)
 ![](https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white) 
 
 Laravel V. 9.4.1
 
 PHP V. 8.0.9
 
 # Getting started

## Installation

Clone and install first CRM renta

    from: https://github.com/rxdlcz/Renta-CRM.git

Clone the repository

    git clone https://github.com/rxdlcz/renta-website.git
    
Switch to the repo folder

    cd laravel-renta-website

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/rxdlcz/renta-website.git
    cd laravel-renta
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan jwt:generate 
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve


**Default User**

    Username: admin
    Password: password
    
# Creator
 Created by: Rex Delacruz
 
 Date: May 02, 2022
