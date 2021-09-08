# 💳 IBAN API validation using ibanapi.com for PHP

The official node package for validating IBAN using the ibanapi.com public API for PHP<br/>
This module offers methods to validate IBAN (full and basic validation) wherein full validation will return the bank information alongside the basic validations. 

## How to use
* Get an [API Key](https://ibanapi.com/get-api) from the ibanapi.com website.
* Install the package using the following command `composer require ibanapi/api`
* You can now initialize & use the package as follows

* For full iban validation
```php
    include "src/Api.php";
    //Get all the IBAN Information
    $ibanApi = new IbanApi\Api("API_KEY");
    $result = $ibanApi->validateIBAN("EE471000001020145685");
    print_r(json_decode($result,true));
```

* For basic iban validation
```php
    include "src/Api.php";
    //Get all the basic IBAN Information
    $ibanApi = new IbanApi\Api("API_KEY");
    $result = $ibanApi->validateIBANBasic("EE471000001020145685");
    print_r(json_decode($result,true));
```

* To get the balance
```php
    include "src/Api.php";
    //Get the account balance
    $ibanApi = new IbanApi\Api("API_KEY");
    $result = $ibanApi->getBalance();
    print_r(json_decode($result,true));
```

# Laravel
This package is PSR4 compitable, and you can load it in laravel easiy, just install the composer package as in the above examples, and use the code directly without the include line.

## Issue or suggestion
Please feel free to open a bug report or pull request to this repo.<br/>
or visit the [iban api website](https://ibanapi.com)