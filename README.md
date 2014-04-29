mason-acm-website
=================

Installation Instructions:

1. Clone repository

2. If you haven't already, install composer, a PHP dependency manager. 
https://getcomposer.org/download/

3. Open terminal, cd /the/directory/you/clonned/to/mason-acm-website

4. create a database called "acm_laravel"

5. run "composer install" --Install dependencies

6. run "php artisan migrate" --creates tables

7. run "php artisan db:seed" --adds dummy records to the database

