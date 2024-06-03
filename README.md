# Dictionaries

[![swagger](https://img.shields.io/badge/documentation-swagger-green)](https://escolalms.github.io/Dictionaries/)
[![codecov](https://codecov.io/gh/EscolaLMS/Dictionaries/branch/main/graph/badge.svg?token=NRAN4R8AGZ)](https://codecov.io/gh/EscolaLMS/Dictionaries)
[![phpunit](https://github.com/EscolaLMS/Dictionaries/actions/workflows/test.yml/badge.svg)](https://github.com/EscolaLMS/Dictionaries/actions/workflows/test.yml)
[![downloads](https://img.shields.io/packagist/dt/escolalms/Dictionaries)](https://packagist.org/packages/escolalms/Dictionaries)
[![downloads](https://img.shields.io/packagist/v/escolalms/Dictionaries)](https://packagist.org/packages/escolalms/Dictionaries)
[![downloads](https://img.shields.io/packagist/l/escolalms/Dictionaries)](https://packagist.org/packages/escolalms/Dictionaries)
[![Maintainability](https://api.codeclimate.com/v1/badges/0c9e2593fb30e2048f95/maintainability)](https://codeclimate.com/github/EscolaLMS/Dictionaries/maintainability)
[![phpstan](https://github.com/EscolaLMS/Dictionaries/actions/workflows/phpstan.yml/badge.svg)](https://github.com/EscolaLMS/Dictionaries/actions/workflows/phpstan.yml)


## What does it do

This package is used for managing dictionaries and their expressions. You can set the number of free views of words from a given dictionary for users who are not assigned.
This package is compatible with the purchasing process in Wellms. The dictionary may be a purchasable product.

## Entity Relationship Diagrams

The diagram below shows the relationships between entities.

```mermaid
erDiagram
    Dictionary ||--o{ DictionaryWord : "has"
    Dictionary ||--o{ DictionaryUser : "has"
    DictionaryWord ||--o{ DictionaryWordCategory : "has"

    Dictionary {
        string name
        string slug
        int free_views_count
    }

    DictionaryWord {
        string word
        string description
        json data
    }

    DictionaryUser {
        datetime end_date
    }
```

## Installing

- `composer require escolalms/dictionaries`
- `php artisan migrate`
- `php artisan db:seed --class="EscolaLms\Dictionaries\Database\Seeders\DictionariesPermissionSeeder"`

## Endpoints

The endpoints are defined in [![swagger](https://img.shields.io/badge/documentation-swagger-green)](https://escolalms.github.io/Dictionaries/)

## Tests

Run `./vendor/bin/phpunit` to run tests.
Test details [![codecov](https://codecov.io/gh/EscolaLMS/Dictionaries/branch/main/graph/badge.svg?token=NRAN4R8AGZ)](https://codecov.io/gh/EscolaLMS/Dictionaries)

## Events

This package does not dispatch any events.

## Listeners

This package does not listen for any events.

## Permissions

This package contains permissions which you can find in [DictionariesPermissionEnum.](https://github.com/EscolaLMS/Dictionaries/blob/main/src/Enums/DictionariesPermissionEnum.php)
The default assignment of permissions to roles is carried out after executing the command `php artisan db:seed --class="EscolaLms\Dictionaries\Database\Seeders\DictionariesPermissionSeeder"`
