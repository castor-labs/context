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

namespace Castor;

use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @covers \Castor\Context\Value
 */
class ContextFunctionsTest extends TestCase
{
    public function testContextFallback(): void
    {
        $contextA = Context\nil();
        $contextB = Context\nil();

        // Fallback should always return a different instance
        $this->assertNotSame($contextA, $contextB);

        // Context for fallback should always yield null
        $this->assertNull($contextA->value('foo'));
        $this->assertNull($contextA->value('bar'));
    }

    /**
     * @covers \Castor\Context\KVPair
     * @covers \Castor\Context\Value
     */
    public function testContextWithValue(): void
    {
        $context = Context\withValue(Context\nil(), 'foo', 'bar');

        $this->assertSame('bar', $context->value('foo'));
        $this->assertNull($context->value('bar'));
    }
}
