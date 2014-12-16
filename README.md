ZF2ADR Skeleton Application
===========================

Introduction
------------
This is a simple, skeleton application using the ZF2 MVC layer and module
systems that uses the ADR pattern.

See https://github.com/pmjones/adr for details on the ADR pattern.

Autoloading Modules
-------------------

Note that the Application module uses composer's autoloader and so is registered
in composer.json

Installation
------------

Using Composer
--------------
The recommended way to get a working copy of this project is to clone the repository
and use `composer` to install dependencies using the `create-project` command:

    curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin
    composer.phar create-project -sdev 19ft/zf2adr-skeleton-application path/to/install


Web Server Setup
----------------

### PHP CLI Server

The simplest way to get started if you are using PHP 5.4 or above is to start the internal PHP cli-server in the root directory:

    php -S 0.0.0.0:8080 -t public/ public/index.php

This will start the cli-server on port 8080, and bind it to all network
interfaces.

**Note: ** The built-in CLI server is *for development only*.

### Apache Setup

To setup apache, setup a virtual host to point to the public/ directory of the
project and you should be ready to go! It should look something like below:

    <VirtualHost *:80>
        ServerName zf2-tutorial.localhost
        DocumentRoot /path/to/zf2-tutorial/public
        SetEnv APPLICATION_ENV "development"
        <Directory /path/to/zf2-tutorial/public>
            DirectoryIndex index.php
            AllowOverride All
            Order allow,deny
            Allow from all
        </Directory>
    </VirtualHost>
