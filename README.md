# transelot

[![Build Status](https://travis-ci.org/kanellov/transelot.svg?branch=master)](https://travis-ci.org/kanellov/transelot)

ISO 843 Transliteration greek to latin

## Installation

Install composer in your project:

    curl -s https://getcomposer.org/installer | php

Install via composer:

    composer install kanellov/transelot
    
If you don't have composer installed globally, please refer to the [https://getcomposer.org/doc/00-intro.md#globally](documentation)

Add this line to your application’s index.php file:
```php
<?php
require 'vendor/autoload.php';
```
## System Requirements

You need PHP >= 5.3.2 and ext-mbstring installed.

## Examples
```php
<?php
$greek = 'Καλημέρα';
$latin = \Knlv\transelot($greek);
echo $latin;
// echoes Kalimera

$greek = 'Ευτυχία';
$latin = \Knlv\transelot($greek);
echo $latin;
// echoes Eftychia
```
