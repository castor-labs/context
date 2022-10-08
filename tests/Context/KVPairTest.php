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

use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @covers \Castor\Context\KVPair
 */
class KVPairTest extends TestCase
{
    public function testDebug(): void
    {
        $ctx = fallback();
        $ctx = with_value($ctx, 'foo', 'bar');
        $ctx = with_value($ctx, 'bar', 'foo');

        $chain = KVPair::debug($ctx);

        $this->assertSame([
            ['bar', 'foo'],
            ['foo', 'bar'],
        ], $chain);
    }
}
