# Hair Salon

#### Epicodus PHP Week 3 Code Review, 2/24/2017

#### By Benjamin T. Seaver

## Description

This Code Review demonstrates using mySQL, Classes, TestClasses, Silex and Twig frameworks.
The emphasis is on back-end functionality.  The front end will be "bare bones".

## Key Project Requirements
* Databases using MAMP: Production - hair_salon, Development - hair_salon_test.
* Tables: `stylists` one to many with `clients`.
* Methods and PHP Unit tests covering: constructor, getters and setters, save, getAll, deleteAll, find, update, and delete.
* SQL commands used to create structure listed below.
* SQL files `hair_salon.sql` and `hair_salon_test.sql` to import with MAMP to setup database structure and insert some sample data.


## Setup/Installation Requirements
* See https://secure.php.net/ for details on installing _PHP_.  Note: PHP is typically already installed on Mac.
* See https://getcomposer.org/ for details on installing _composer_.
* See https://mamp.info/ for details on installing _MAMP_.
* Use MAMP `http://localhost:8888/phpmyadmin/` to import databases and data from SQL files.
* Use same MAMP website to copy to_do database to `to_do_test` database (if you would like to try PHPUnit tests).
* Start SQL at command prompt if desired with > `/Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot`
* Clone project
* From project root, run > `composer install --prefer-source --no-interaction`
* To run PHPUnit tests from root > `vendor/bin/phpunit tests`
* From web folder in project, Start PHP > `php -S localhost:8000`
* In web browser open `localhost:8000`

## Known Bugs
* No known bugs

## Support and contact details
* No support

## Technologies Used
* PHP
* MAMP
* mySQL
* Composer
* PHPUnit
* Silex
* Twig
* HTML
* Git

## Copyright (c)
* 2017 Benjamin T. Seaver

## License
* MIT

## Implementation Plan

* Install PHPUnit, Silex and Twig dependencies (composer.json composer.log, .gitignore)
* From mySQL prompt, create database structure of hair_salon (hair_salon.sql)
* Duplicate hair_salon to hair_salon_test (hair_salon_test.sql)
* Create empty class and methods for Stylist (src/Stylist.php)
* Iterate building StylistTest class tests and implementing methods in Stylist (tests/StylistTest.php, src/Stylist.php)
* Initial Silex framework with "Hello Hair Salon" on home page (web/index.php, app/app.php)
* Iterate building Twig template(s) and routes to support all back-end Stylist functionality (views/, app/app.php))
* Create empty class and methods for Client (src/Client.php)
* Iterate building ClientTest class tests and implementing methods in Client (tests/ClientTest.php, src/Client.php)
* Iterate building Twig template(s) and routes to support all back-end Client functionality (views/, app/app.php))
* Re-export hair_salon database this time including sample data (hair_salon.sql)

* End specifications
