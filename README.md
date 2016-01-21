# Typed Arrays

[![Build Status](https://travis-ci.org/AndrewCarterUK/TypedArrays.svg?branch=master)](https://travis-ci.org/AndrewCarterUK/TypedArrays)
[![Code Coverage](https://scrutinizer-ci.com/g/AndrewCarterUK/TypedArrays/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/AndrewCarterUK/TypedArrays/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/AndrewCarterUK/TypedArrays/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/AndrewCarterUK/TypedArrays/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/andrewcarteruk/typed-arrays/v/stable)](https://packagist.org/packages/andrewcarteruk/typed-arrays)
[![Total Downloads](https://poser.pugx.org/andrewcarteruk/typed-arrays/downloads)](https://packagist.org/packages/andrewcarteruk/typed-arrays)
[![License](https://poser.pugx.org/andrewcarteruk/typed-arrays/license)](https://packagist.org/packages/andrewcarteruk/typed-arrays)

Typed arrays in PHP.

## Example Usage

```php
use TypedArray\StringArray;

$stringArray = new StringArray();

$stringArray[] = 'Hello, World!';
$stringArray['foo'] = 'bar';

try {
    $stringArray[] = 1;
} catch (\InvalidArgumentException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}
```
