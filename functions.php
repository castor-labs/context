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
function with_value(Context $context, mixed $key, mixed $value): Context
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
 * This method always returns the same instance.
 *
 * @psalm-external-mutation-free
 */
function fallback(): Context
{
    static $context = null;
    if (null === $context) {
        $context = new Value(null);
    }

    return $context;
}
