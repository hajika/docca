Docca
=====

With Docca you can simply archive scanned documents.

Installation
--
You need to have `git` and `composer` installed on your linux system

    $ git clone https://github.com/hajika/docca
    $ cd docca
    $ composer install
    $ bin/console doctrine:schema:update -f

Then for development (only):

    $ bin/console server:start
    
After that you should be able to run it in your browser with http://localhost:8000
    
***Docca is alpha version in development and should not be used in productive environment yet***
