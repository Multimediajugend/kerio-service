# kerio-service
Service for user administration for Kerio Control through a simple JSON REST interface.

## installation
To install just do a `composer install` in the main directory to load all dependencies and configure the autoloader.

## usage
The easiest way is to test it with the php built in webserver:
* cd to the `public` folder
* start the server via `php -S localhost:8000`

## available routes
* `http://localhost:8000/index.php/kerio/users` lists all users configured in kerio control

## hints
* This service does not include a user authentication yet. So make shure to secure this service for authorized users e.g. by a firewall.  