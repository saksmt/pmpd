<?php

namespace Smt\Pmpd\Response\Impl;

use Smt\Pmpd\Response\FailResponse;

/**
 * Test response class
 * @package Smt\Pmpd\Response\Impl
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
class SocketResponseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function test()
    {
        $response = SocketResponse::fromRaw([
            'Hello: world',
            'OK',
            '',
        ]);
        $this->assertInstanceOf(SocketResponse::class, $response);
        $this->assertNotInstanceOf(FailSocketResponse::class, $response);
        $this->assertFalse($response->isEmpty());
        $this->assertEquals('world', $response->get('Hello'));
        $this->assertNull($response->get('Non-existent'));
    }

    /**
     * @test
     */
    public function testFail()
    {
        $response = SocketResponse::fromRaw([
            'ACK [10@0] {test} Expect fail',
            '',
        ]);
        $this->assertInstanceOf(FailResponse::class, $response);
        $this->assertEquals('10', $response->getErrorCode());
        $this->assertEquals('0', $response->getLineNumber());
        $this->assertEquals('test', $response->getCommand());
        $this->assertEquals('Expect fail', $response->getMessage());
    }

    /**
     * @test
     */
    public function testEmpty()
    {
        $this->assertTrue(SocketResponse::fromRaw(['OK', ''])->isEmpty());
    }
}
