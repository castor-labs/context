<?php

declare(strict_types=1);

/**
 * @project Castor Context
 * @link https://github.com/castor-labs/context
 * @project castor/context
 * @author Matias Navarro-Carter mnavarrocarter@gmail.com
 * @license BSD-3-Clause
 * @copyright 2022 Castor Labs Ltd
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Castor\Context;

use Castor\Context;

/**
 * Returns a new context that holds the passed key value pair.
 *
 * @psalm-pure
 */
function withValue(Context $context, mixed $key, mixed $value): Context
{
    return new KVPair($context, $key, $value);
}

/**
 * Returns the default fallback context.
 *
 * This is a context that always returns null.
 *
 * You can think about it as an "empty" context.
 *
 * @psalm-pure
 */
function nil(): Context
{
    return new Value();
}

/**
 * Returns a new context that holds the passed key value pair.
 *
 * @psalm-pure
 *
 * @deprecated Use Castor\Context\withValue() instead
 */
function with_value(Context $ctx, mixed $key, mixed $value): Context
{
    trigger_error('Castor\Context\with_value() is deprecated and it will be removed in a future version. Please use Castor\Context\withValue() instead', E_USER_DEPRECATED);

    return withValue($ctx, $key, $value);
}

/**
 * Returns the default fallback context.
 *
 * This is a context that always returns null.
 *
 * You can think about it as an "empty" context.
 *
 * @psalm-pure
 *
 * @deprecated Use Castor\Context\nil() instead
 */
function fallback(): Context
{
    trigger_error('Castor\Context\fallback() is deprecated and it will be removed in a future version. Please use Castor\Context\nil() instead', E_USER_DEPRECATED);

    return nil();
}
