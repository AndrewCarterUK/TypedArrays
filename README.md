# Typed Arrays

[![Build Status](https://travis-ci.org/AndrewCarterUK/TypedArrays.svg?branch=master)](https://travis-ci.org/AndrewCarterUK/TypedArrays)
[![Code Coverage](https://scrutinizer-ci.com/g/AndrewCarterUK/TypedArrays/badges/coverage.png?b=master&refresh_token=1)](https://scrutinizer-ci.com/g/AndrewCarterUK/TypedArrays/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/AndrewCarterUK/TypedArrays/badges/quality-score.png?b=master&refresh_token=1)](https://scrutinizer-ci.com/g/AndrewCarterUK/TypedArrays/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/andrewcarteruk/typed-arrays/v/stable)](https://packagist.org/packages/andrewcarteruk/typed-arrays)
[![Total Downloads](https://poser.pugx.org/andrewcarteruk/typed-arrays/downloads)](https://packagist.org/packages/andrewcarteruk/typed-arrays)
[![License](https://poser.pugx.org/andrewcarteruk/typed-arrays/license)](https://packagist.org/packages/andrewcarteruk/typed-arrays)

Typed arrays in PHP.

## Install

Installing using [Composer](https://getcomposer.org).

```bash
composer require andrewcarteruk/typed-arrays
```

## Warning

These are objects that act like arrays, they are not native PHP arrays and will not pass an `is_array()` test.

As they are objects, unlike PHP arrays, they are always passed by reference.

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

```php
use App\Farm\Chicken;
use TypedArray\InstanceArray;

$chickenArray = new InstanceArray(Chicken::class);

$chickenArray[] = new Chicken('Tony');
$chickenArray['foo'] = new Chicken('Alice');

try {
    $chickenArray[] = 1;
} catch (\InvalidArgumentException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}
```

## Available Types

`ArrayArray`, `BoolArray`, `CallableArray`, `FloatArray`, `InstanceArray($classPath)`, `IntArray`, `NumericArray`, `ObjectArray`, `ResourceArray`, `ScalarArray`, `StringArray`.
