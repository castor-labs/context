Castor Context
==============

![php-workflow](https://github.com/castor-labs/context/actions/workflows/php.yml/badge.svg?branch=main)
![code-coverage](https://img.shields.io/badge/Coverage-100%25-brightgreen.svg?longCache=true&style=flat)

Context passing abstraction for modern PHP projects, inspired in [Golang's `context` package](https://pkg.go.dev/context).

## Installation

```bash
composer require castor/context
```

## Quick Start

```php
<?php

use Castor\Context;

// This is a default base context
$ctx = Context\nil();

// This returns a new context with the passed values stored
$ctx = Context\withValue($ctx, 'foo', 'bar');

// Later in the call stack
echo $ctx->value('foo'); // Prints: bar
```

To learn about the rationale behind this library, best practices when using it and implementation examples, check 
the [documentation](https://castor-labs.github.io/docs/packages/context/intro.html).