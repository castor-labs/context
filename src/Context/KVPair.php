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
 * KVPair composes a Context holding a key value pair.
 *
 * If the stored key is strictly equal to the passed key, then the stored value is returned.
 *
 * If the keys are not strictly equal, it passes the call to the next context.
 *
 * @psalm-immutable
 */
final class KVPair implements Context
{
    private Context $next;
    private mixed $key;
    private mixed $value;

    public function __construct(Context $next, mixed $key, mixed $value)
    {
        $this->next = $next;
        $this->key = $key;
        $this->value = $value;
    }

    /**
     * {@inheritDoc}
     */
    public function value(mixed $key): mixed
    {
        if ($this->key === $key) {
            return $this->value;
        }

        return $this->next->value($key);
    }
}
