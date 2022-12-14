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
 * Value is a Context implementation that always returns the same value, no matter the key.
 *
 * You SHOULD NOT use this class directly in application code. It is, however, very useful in
 * testing scenarios.
 *
 * @psalm-immutable
 */
final class Value implements Context
{
    private mixed $value;

    public function __construct(mixed $value = null)
    {
        $this->value = $value;
    }

    /**
     * {@inheritDoc}
     */
    public function value(mixed $key): mixed
    {
        return $this->value;
    }
}
