

# Brasil API PHP SDK

[![Build Status](https://img.shields.io/github/workflow/status/gutocf/brasil-api-php-sdk/CI/main?style=flat-square)](https://github.com/gutocf/brasil-api-php-sdk/actions?query=workflow%3ACI+branch%3Amain)
[![Coverage Status](https://img.shields.io/codecov/c/github/gutocf/brasil-api-php-sdk.svg?style=flat-square)](https://codecov.io/github/gutocf/brasil-api-php-sdk)
[![PHPStan](https://img.shields.io/badge/PHPStan-Level%207-brightgreen.svg?style=flat-square&logo=php)](https://shields.io/#/)
[![PHP Version Require](http://poser.pugx.org/gutocf/brasil-api-php-sdk/require/php)](https://packagist.org/packages/gutocf/brasil-api-php-sdk)
[![Packagist Version](https://img.shields.io/packagist/v/gutocf/brasil-api-php-sdk?style=flat-square)](https://packagist.org/packages/gutocf/brasil-api-php-sdk)
[![License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://packagist.org/packages/gutocf/brasil-api-php-sdk)
[![Total Downloads](https://img.shields.io/packagist/dt/gutocf/brasil-api-php-sdk.svg?style=flat-square)](https://packagist.org/packages/gutocf/brasil-api-php-sdk)

PHP SDK for [BrasilAPI](https://brasilapi.com.br/).

## Requirements

 - PHP ^8.0

## Installation

You can install the package via composer:

    composer require gutocf/brasil-api-php-sdk

## Usage

First you need to get an instance of the BrasilAPI class:

```php
use Gutocf\BrasilAPI\BrasilAPI;

$BrasilAPI = new BrasilAPI();
```
After that, you can use the service methods as follows. All services methods return an object or array of objects children of `DataTransferObject` from the [spatie/data-transfer-object](https://github.com/spatie/data-transfer-object/) library.

### CEP (V1)

```php
//Gets a bank by its code.
$cep = $BrasilAPI->cepV1()->get('88045540');
```
### CEP (V2)

```php
//Gets a bank by its code.
$cep = $BrasilAPI->cepV2()->get('88045540');
```

### Banks

```php
//Gets all banks.
$banks = $BrasilAPI->banksV1()->getAll();

//Gets a bank by its code.
$bank = $BrasilAPI->banksV1()->get(1);
```

### Holidays

```php
//Gets holidays by year
$banks = $BrasilAPI->holidaysV1()->getByYear(2022);
```

### CNPJ

```php
//Gets information about a CNPJ
$banks = $BrasilAPI->cnpjV1()->get('39729684000100');
```

### DDD

```php
//Gets information about a DDD
$ddd = $BrasilAPI->dddV1()->get(48);
```

### FIPE

#### Reference Tables
```php
use Gutocf\BrasilAPI\Entity\V1\Fipe\Enum\VehicleType;

//Gets all reference tables
$referenceTables = $BrasilAPI->fipeV1()->getAllReferenceTables();
```
#### Vehicles
```php
//Gets vehicle price information by FIPE code
$vehicles = $BrasilAPI->fipeV1()->getAllVehicleByCode('003281-6');
//Gets vehicle price information by FIPE code for a specific table
$vehicles = $BrasilAPI->fipeV1()->getAllVehicleByCode('003281-6', 123);
```
#### Brands
```php
use Gutocf\BrasilAPI\Entity\V1\Fipe\Enum\VehicleType;

//Gets all brands
$brands = $BrasilAPI->fipeV1()->getAllBrandsByType();
//Gets all brands by vehicle type
$brands = $BrasilAPI->fipeV1()->getAllBrandsByType(VehicleType::CARS());
//Gets all brands by vehicle type for a specific table
$brands = $BrasilAPI->fipeV1()->getAllBrandsByType(VehicleType::CARS(), 123);
```

### IBGE

####  Cities by State
```php
$cities = $BrasilAPI->ibgeV1()->getCitiesByState('SC');
```
####  States
```php
$states = $BrasilAPI->ibgeV1()->getAllStates();
```
####  State by initials or code
```php
$state = $BrasilAPI->ibgeV1()->getState('sc');
//OR
$state = $BrasilAPI->ibgeV1()->getState(42);
```

## Error handling

HTTP errors communicating with the **Brasil API** will throw exceptions as follows:
|Status code|Exception|
|--|--|
| 400 | ```Gutocf\BrasilAPI\Exception\NotFoundException``` |
| 404 |```Gutocf\BrasilAPI\Exception\BadRequestException```|
| 500 |```Gutocf\BrasilAPI\Exception\InternalServerErrorException```|
