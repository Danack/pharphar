#!/bin/bash

php -d phar.readonly=0 phar1/create1.php
php -d phar.readonly=0 phar2/create2.php
