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

$ctx = Context\fallback(); // This is a default base context
$ctx = Context\with_value($ctx, 'foo', 'bar'); // This returns a new context with the passed values stored

// Later in the call stack

echo $ctx->value('foo'); // Prints: bar
```

To learn about the rationale behind this library, best practices when using it and implementation examples, check 
the [documentation](https://castor-labs.github.io/docs/packages/context/intro.html).