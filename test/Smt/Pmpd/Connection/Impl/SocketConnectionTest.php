<?php

namespace Smt\Pmpd\Connection\Impl;

use org\bovigo\vfs\vfsStream;
use Smt\Pmpd\Configuration\HostConfiguration;
use Smt\Pmpd\Connection\ConnectionFactory;

require_once __DIR__ . '/stubs.php';

/**
 * Test for @a SocketConnection
 * @package Smt\Pmpd\Connection\Impl
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
class SocketConnectionTest extends \PHPUnit_Framework_TestCase
{
    const PORT = 6600;
    const FAIL_HOST = 'failhost';
    const DATA = 'test "argument" "an argument"' . "\n";
    private static $testing = false;

    /**
     * @var SocketConnection
     */
    private $testable;

    /**
     * @var VfsStream
     */
    private static $vsf;

    /** {@inheritdoc} */
    protected function setUp()
    {
        parent::setUp();
        $this->testable = new SocketConnection();
    }

    /**
     * @test
     */
    public function testLifecycle()
    {
        $this->assertFalse($this->testable->isConnected());
        $this->assertEquals($this->testable, $this->testable->setConfiguration(
            (new HostConfiguration())
                ->setPassword('test')
        ));
        $this->assertEquals($this->testable, $this->testable->open());
        $this->assertTrue($this->testable->isConnected());
        $this->assertEquals($this->testable, $this->testable->close());
        $this->assertFalse($this->testable->isConnected());
    }

    /**
     * @test
     * @expectedException \Smt\Pmpd\Exception\ConnectionEstablishmentException
     * @expectedExceptionMessage Error connecting to mpd://failhost:6600 - "fail" (0)
     */
    public function testFailOpen()
    {
        $this->testable->setConfiguration(
            (new HostConfiguration())
                ->setHost(self::FAIL_HOST)
        );
        $this->testable->open();
    }

    /**
     * @test
     * Yep, I'm veeery lazy
     */
    public function testSendAndFactory()
    {
        $connectionFactory = new ConnectionFactory();
        $configuration = new HostConfiguration();
        $connection = $connectionFactory->createConnection($configuration);
        $this->assertEquals($connection, $connectionFactory->createConnection($configuration));
        $connection->send('test', 'argument', 'an argument');
    }

    /**
     * @test
     * @expectedException Smt\Pmpd\Exception\ConnectionEstablishmentException
     * @expectedExceptionMessage Failed to send data: maximum retries amount reached...
     */
    public function testFailRecover()
    {
        self::$testing = true;
        $this->testable
            ->setConfiguration(new HostConfiguration())
            ->open()
            ->send('fail')
        ;
    }

    /**
     * @test
     * @expectedException Smt\Pmpd\Exception\ConnectionNotEstablishedException
     */
    public function testSendNotConnected()
    {
        $this->testable->send('fail');
    }

    /**
     * fsockopen
     * @param string $host Host
     * @param int $port Port
     * @param int& $errorCode Error code
     * @param string& $message Message
     * @return bool
     */
    public static function checkOpenArguments($host, $port, &$errorCode, &$message)
    {
        self::assertEquals(self::PORT, $port);
        if ($host == self::FAIL_HOST) {
            $errorCode = 0;
            $message = 'fail';
            return false;
        }
        $root = VfsStream::setup();
        VfsStream::newFile('test')
            ->at($root)
            ->withContent("OK\nOK\n");
        return fopen('vfs://root/test', 'r');
    }

    /**
     * fputs
     * @param bool $socket Socket emulation
     * @param string $data Data
     */
    public static function checkSendingArguments($socket, $data)
    {
        self::assertEquals(self::DATA, $data);
    }

    /**
     * @return string
     */
    public static function getContent()
    {
        return "OK\n";
    }

    /**
     * @return bool
     */
    public static function getFeofResponse()
    {
        return self::$testing;
    }
}