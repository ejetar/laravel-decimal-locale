# Laravel Decimal Locale
🔄 Cast your model attributes to the decimal format of another location.

## Table of Contents
  * [How it works](#how-it-works)
  * [Compatibility](#compatibility)
    + [Example 1](#example-1)
      - [Output](#output)
    + [Example 2](#example-2)
      - [Output](#output-1)
    + [Example 3](#example-3)
      - [Output](#output-2)
  * [Installation](#installation)
  * [Changelog](#changelog)
  * [Contributing](#contributing)
  * [License](#license)

## How it works
The laravel-decimal-locale library allows you to convert decimal numbers to the format of different locations.

**Example**

1000.5 to:
Locale Code|Locale Name|Result
------|----|-----
...|...|...
af|Afrikaans|1.000,5
ar|Arabic|1,000.5
ar-AE|Arabic (U.A.E.)|١٬٠٠٠٫٥
bg-BG|Bulgarian (Bulgaria)|1000,5
cs|Czech|1 000,5
de-CH|German (Switzerland)|1’000.5
...|...|...

This library was born with the main objective of providing, in a simple way, the possibility of converting decimal numbers into API responses. Therefore, currently there is only one way to inform the application what the location you want is by request, through the `DecimalLocale` header. You are free to expand the possibilities of this solution, I will be very happy to receive your contribution. :)

But let's get down to business...

This package provides an attribute conversion class called `Decimal`. All you need to do is:
1. In the desired Model, add the cast to the desired attribute. Just like the example below:
```php
<? php
namespace App;

use Ejetar\DecimalLocale\Casts\Decimal;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $casts = [
        'price' => Decimal::class,
    ];
    protected $fillable = [
        'id',
        'price',
        'name'
    ];
}
```
2. Send a request to the equivalent endpoint informing the `DecimalLocale` header. Example:
```
GET /api/v1/products
DecimalLocale: pt-br
```

## Compatibility
Laravel 7+

### Example 1
```
GET /api/v1/products
DecimalLocale: en
```
#### Output
```json
[
    {
        "id": 1,
        "name":"Gold Ball",
        "value": "1,000.5",
        "created_at": "2019-04-24 20:34:03",
        "updated_at": "2019-04-24 20:34:03"
    }
]
```
### Example 2
```
GET /api/v1/products
DecimalLocale: pt-br
```
#### Output
```json
[
    {
        "id": 1,
        "name":"Gold Ball",
        "value": "1.000,5",
        "created_at": "2019-04-24 20:34:03",
        "updated_at": "2019-04-24 20:34:03"
    }
]
```
### Example 3
```
GET /api/v1/products
```
Without DecimalLocale header.
#### Output
```json
[
    {
        "id": 1,
        "name":"Gold Ball",
        "value": 1000.5,
        "created_at": "2019-04-24 20:34:03",
        "updated_at": "2019-04-24 20:34:03"
    }
]
```

## Installation
1. First, run: `composer require ejetar/laravel-decimal-locale`
2. After, add `Ejetar\DecimalLocale\Providers\AppServiceProvider::class` in `providers` array in config/app.php file

## Changelog
Nothing for now...

## Contributing
Contribute to this wonderful project, it will be a pleasure to have you with us. Let's help the free software community. You are invited to incorporate new features, make corrections, report bugs, and any other form of support.
Don't forget to star in this repository! 😀 

## License
This library is a open-source software licensed under the MIT license.
