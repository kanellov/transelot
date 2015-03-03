# transelot

[![Build Status](https://travis-ci.org/kanellov/transelot.svg?branch=develop)](https://travis-ci.org/kanellov/transelot)

ISO 843 Transliteration greek to latin

## Installation

Install composer in your project:

    curl -s https://getcomposer.org/installer | php

Create a composer.json file in your project root:

    {
        "require": {
            "kanellov/transelot": "dev-master"
        }
    }

Install via composer:

    php composer.phar install

Add this line to your application’s index.php file:

    <?php
    require 'vendor/autoload.php';

## System Requirements

You need PHP >= 5.3.2 and ext-mbstring installed.

## Examples

    <?php
    $greek = 'Καλημέρα';
    $latin = \Knlv\transelot($greek);
    echo $latin;
    // echoes Kalimera
    
    $greek = 'Ευτυχία';
    $latin = \Knlv\transelot($greek);
    echo $latin;
    // echoes Eftychia
