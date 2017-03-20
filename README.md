# simple-search

Installation
------------

##### 1) Install composer:
```bash
curl -sS https://getcomposer.org/installer | php
php composer.phar install
```

##### 2) Edit DB settings and create DB:
Edit db.yml file and create DB in MySQL shell.


```bash
create database `simple_search` character set 'utf8';
```

##### 3) Start install script:


```bash
sh ./install.sh
```

Usage
-----

From root folder:

```bash
php console search-user
# or
php console search-user ni
# or
php console search-user ni --format=html
# or
php console search-user '{"last-name":"ni"}' --format=json
# or
php console search-user --format=json
```
