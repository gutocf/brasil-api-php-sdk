
# Brasil API PHP SDK

[![Build Status](https://img.shields.io/github/workflow/status/gutocf/brasil-api-php-sdk/CI/main?style=flat-square)](https://github.com/gutocf/brasil-api-php-sdk/actions?query=workflow%3ACI+branch%3Amain)
[![Coverage Status](https://img.shields.io/codecov/c/github/gutocf/brasil-api-php-sdk.svg?style=flat-square)](https://codecov.io/github/gutocf/brasil-api-php-sdk)
[![Latest Stable Version](https://poser.pugx.org/gutocf/brasil-api-php-sdk/v/stable.svg)](https://packagist.org/packages/gutocf/brasil-api-php-sdk)
[![Total Downloads](https://img.shields.io/packagist/dt/gutocf/brasil-api-php-sdk.svg?style=flat-square)](https://packagist.org/packages/gutocf/brasil-api-php-sdk)
[![License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://packagist.org/packages/gutocf/brasil-api-php-sdk)
[![PHPStan](https://img.shields.io/badge/PHPStan-Level%207-brightgreen.svg?style=flat-square&logo=php)](https://shields.io/#/)
[![Packagist Version](https://img.shields.io/packagist/v/gutocf/brasil-api-php-sdk?style=flat-square)](https://packagist.org/packages/gutocf/brasil-api-php-sdk)

PHP SDK for [BrasilAPI](https://brasilapi.com.br/).

## Requirements
 - PHP 7.4+

## Installation

You can install the package via composer:

    composer require gutocf/brasil-api-php-sdk

## Usage

First you need to get an instance of the BrasilAPI class:

```php
use Gutocf\BrasilAPI\BrasilAPI;

$BrasilAPI = new BrasilAPI();
```
After that, you can use the service methods as follows:

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
