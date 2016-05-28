# A Student Blog

Lorem ipsum

### Requirements

* Homebrew
* Node
* Bower
* PHP +7.0
* pdo-pgsql module for PHP
* Grunt-CLI
* Postgresql



#### Installation

```
// Homebrew
$ /usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"

// Node
$ brew install node

// Bower
$ npm install -g bower

// PHP +7.0
$ brew tap homebrew/dupes
$ brew tap homebrew/versions
$ brew tap homebrew/homebrew-php
$ brew install php70

// pdo-pgsql
$ brew install php70-pdo-pgsql

// Grunt-CLI
$ npm install -g grunt-cli

// Postgresql
$ brew install postgresql
```

Remember to change `php5_module`  in `/etc/apache2/httpd.conf` to

```
LoadModule php7_module /usr/local/opt/php70/libexec/apache2/libphp7.so
```



### First time setup

```
$ createdb my-kth-blog

// into cd /my-kth-blog
$ php artisan migrate
$ psql my-kth-blog
=# \i path to /database/initalization/initalize.sql
=# \q


```

