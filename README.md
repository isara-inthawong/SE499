# SE499 Software Engineering Project

เว็บแอพพลิเคชันสำหรับบริหารกิจกรรมสโมสรนักศึกษาคณะวิทยาศาสตร์ (Activity Management For Student Science Club)

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

This project has a few system requirements. You will need to make sure your have software the following requirements:

* [XAMPP](https://www.apachefriends.org/index.html) - is PHP development environment.
* [Composer](https://getcomposer.org/) - is a dependency manager for PHP.

### Installing

Create your database

``` sh
databases name is "se499_db"
collation is "utf8mb4_unicode_ci"
```

Create & edit file ".env" by copy file ".env.example", rename to ".env" and copy this code to overwrite data in file ".env"

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=se499_db
DB_USERNAME=root
DB_PASSWORD=
```

Install the dependencies, devDependencies.

```sh
$ cd /folder address SE499
$ composer update
$ php artisan key:generate
$ php artisan migrate
```

Start the server

```sh
$ php artisan serve
```

Go to the website by this URL after run serve

```sh
127.0.0.1:8000
```

2 default account 
 - Username: "admin@admin.com" Password: "qqqqwwww"
 - Username: "member@member.com" Password: "qqqqwwww"
  
## Built With

* [Laravel](https://laravel.com/) - is Backend Framework
* [Bootstrap](https://getbootstrap.com/) - is Frontend Framework

## Versioning

For the versions available, see the [tags on this repository](https://github.com/isara5678/SE499/tags). 

## Authors

* **Isara Intawong** - *Initial work* - [Bell](https://github.com/isara5678)

See also the list of [contributors](https://github.com/isara5678/SE499/contributors) who participated in this project.
