#! /usr/bin/env bash

curl -sS https://getcomposer.org/installer | php
php composer.phar install

php vendor/bin/doctrine orm:schema-tool:drop --force
php vendor/bin/doctrine orm:schema-tool:create
php vendor/bin/doctrine dbal:run-sql "`cat demo_data.sql`"
