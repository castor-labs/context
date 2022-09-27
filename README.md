MNC Context
========

Context passing abstraction for modern PHP projects.

## Installation

```bash
composer require mnavarrocarter/context
```

## Quick Start

This library provides a solution for the problem of passing contextual information down the call stack of an 
application. To understand this problem you can read Matthias Noback's clear summary in 
[his blog](https://matthiasnoback.nl/2018/04/context-passing/).

Context is an abstraction to store these request-scoped values and then retrieve them later in the call stack. It
is heavily inspired in [Golang's own Context Api](https://pkg.go.dev/context).

```php
<?php

use MNC\Context;

$ctx = Context\fallback();
$ctx = Context\with_value($ctx, 'foo', 'bar');

// Later in the call stack

echo $ctx->value('foo'); // Prints: bar
```

Since it is a lightweight dependency, it is designed to be part of your domain / business logic as a
contextual abstraction.

In the following example, we use context to query the users of a particular tenant.

It is best practice to create your own functions on top of the base context api to ease the boilerplate
of setting / retrieving values.

Also, if you run PHP >=8.1, enums are better suited for keys rather than strings since these could
not collide with other keys of the same name in other libraries that use the context api.

```php
<?php

namespace MyApp;

use MNC\Context;

enum ContextKey
{
    case TENANT_ID
    case USER_ID    
}

function with_tenant_id(Context $ctx, string $tenantId): Context
{
    return Context\with_value($ctx, ContextKey::TENANT_ID, $tenantId);
}

function get_tenant_id(Context $ctx): string
{
    $val = $ctx->value(ContextKey::TENANT_ID);
    if (!is_string($val) {
        return '';
    }
    
    return $val;
}

function with_user_id(Context $ctx, string $userId): Context
{
    return Context\with_value($ctx, ContextKey::USER_ID, $userId);
}

function get_user_id(Context $ctx): string
{
    $val = $ctx->value(ContextKey::USER_ID);
    if (!is_string($val) {
        return '';
    }
    
    return $val;
}

class UserRepository
{
    private QueryBuilder $query;
    
    public function __construct(QueryBuilder $query)
    {
        $this->query = $query;
    }
    
    public function all(Context $ctx): array
    {
        $query = $this->query->select()->from('users');
        
        $tenantId = get_tenant_id($ctx);
        if ($tenantId !== '') {
            $query = $query->where('tenant_id = ?', $tenantId);
        }
        
        return $query->execute();
    }
}
```
