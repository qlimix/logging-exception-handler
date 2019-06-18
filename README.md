# Logging-exception-handler

[![Travis CI](https://api.travis-ci.org/qlimix/logging-exception-handler.svg?branch=master)](https://travis-ci.org/qlimix/logging-exception-handler)
[![Coveralls](https://img.shields.io/coveralls/github/qlimix/logging-exception-handler.svg)](https://coveralls.io/github/qlimix/logging-exception-handler)
[![Packagist](https://img.shields.io/packagist/v/qlimix/logging-exception-handler.svg)](https://packagist.org/packages/qlimix/logging-exception-handler)
[![MIT License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](https://github.com/qlimix/logging-exception-handler/blob/master/LICENSE)

Logging exceptions.

## Install

Using Composer:

~~~
$ composer require qlimix/logging-exception-handler
~~~

## usage

```php
<?php

use Qlimix\Log\Logger\Exception\ExceptionLogger;
use Exception;

$logHandler = new FileLogHandler();
$logger = new ExceptionLogger($logHandler);

$logger->emergency('foo', new Exception());
$logger->critical('foo', new Exception());
$logger->alert('foo', new Exception());
$logger->error('foo', new Exception());
$logger->debug('foo', new Exception());
```

## Testing
To run all unit tests locally with PHPUnit:

~~~
$ vendor/bin/phpunit
~~~

## Quality
To ensure code quality run grumphp which will run all tools:

~~~
$ vendor/bin/grumphp run
~~~

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.
