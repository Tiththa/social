<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Social.io

- Simple Registration and Login/Logout
- Wall for each user
- Captcha in registration page
- Password strength validation
- Profile Picture add/update
- About me page
- Administration Access (Role Based)
- Add Friends

## Setting-up

- XAMPP Setup
    - XAMPP v3.330 up with PHP 8.0
    - Setup vhost `xampp/apache/conf/extra/httpd-vhosts.conf`
    - Update hosts file with the specified domain `social.io`
    - Restart after setting-up these configurations
    
    ```php
    <VirtualHost social.io:80>
        ServerAdmin webmaster@localhost
        DocumentRoot "C:/xampp/htdocs/social/public"
        ServerName social.io	
        
        <Directory "C:/xampp/htdocs/social/public">
            Options Indexes FollowSymLinks MultiViews
            AllowOverride All
            Order Allow,Deny
            Allow from all
            Require all granted
        </Directory>
    </VirtualHost>
    ```
    ```php
    127.0.0.1 social.io
    ```
- Unzip the file in htdocs. Should only have one level

    ```php
    //not like this - path/htdocs/social/social/public
    
    //should be like this - path/htdocs/social/public
    ```
- Download Composer from [official site](https://getcomposer.org/download/)
- Download and install NodeJs [official site](https://nodejs.org/en/download/)
- cd into the project `social` 
  ```php
  composer install  
  ```
  ```php
  npm install  
  ```
  ```php
  npm run dev  
  ```
  ```php
  cp .env.example .env 
  //copy the .env.example to .env  
  ```
  ```php
  php artisan key:generate  
  ```
- Setup a database name (default: social)
- migrate and seed the database

  ```php
  php artisan migrate --seed  
  ```

## Configuration

### Admin Details
- Username: `Admin`
- Password: `\2\r&Gep6&8A;49K`

Password defined in `database/seeders/DatabaseSeeder.php`


## Stack

- [Jetstream](https://jetstream.laravel.com) with [Fortify](https://laravel.com/docs/8.x/fortify) for Authentication
- [Alipne JS](https://alpinejs.dev) and [Livewire](https://laravel-livewire.com/) for Advanced Ajax/Reloading without refreshing
- [Telescope](https://laravel.com/docs/8.x/telescope) for Logging and Debugging
- [Google Recaptcha V3](https://www.google.com/recaptcha/admin)





