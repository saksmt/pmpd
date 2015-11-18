<?php

namespace Smt\Pmpd\Client\Impl;

use Smt\Pmpd\Connection\Commands;
use Smt\Pmpd\Connection\Connection;
use Smt\Pmpd\Entity\Enum\PlaybackState;
use Smt\Pmpd\Entity\Status;
use Smt\Pmpd\Entity\Track;
use Smt\Pmpd\Exception\ClientExecutionException;
use Smt\Pmpd\Exception\ConnectionEstablishmentException;
use Smt\Pmpd\Response\Impl\SocketResponse;

/**
 * Test for @a DefaultClient
 * @package Smt\Pmpd\Client\Impl
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
class DefaultClientTest extends \PHPUnit_Framework_TestCase
{
    const SUCCESS_VOLUME = 0;
    const FAIL_VOLUME = 1;

    /**
     * @var DefaultClient
     */
    private $testable;

    /**
     * @var Connection|\PHPUnit_Framework_MockObject_MockObject
     */
    private $connection;

    protected function setUp()
    {
        parent::setUp();
        $this->connection = $this->getMockBuilder(Connection::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;
        $emptyResponse = SocketResponse::fromRaw(['OK', '']);
        $this->connection
            ->method('send')
            ->willReturnMap([
                [Commands::GET_STATUS, SocketResponse::fromRaw(['state: play', 'OK', ''])],
                [Commands::CURRENT, SocketResponse::fromRaw(['Title: test', 'OK', ''])],
                [Commands::NEXT, $emptyResponse],
                [Commands::PREVIOUS, $emptyResponse],
                [Commands::PLAY, $emptyResponse],
                [Commands::SET_VOLUME, self::SUCCESS_VOLUME, $emptyResponse],
                [Commands::PAUSE, $emptyResponse],
                [Commands::PAUSE, 1, $emptyResponse],
                [Commands::UPDATE, $emptyResponse],
                [Commands::IDLE, Commands::UPDATE, $emptyResponse],
                [Commands::SET_VOLUME, self::FAIL_VOLUME, SocketResponse::fromRaw(['ACK [0@0] {fail} fail', ''])],
            ])
        ;
        $this->testable = new DefaultClient($this->connection);
    }

    /**
     * @test
     */
    public function testStatus()
    {
        $result = $this->testable->getStatus();
        $this->assertInstanceOf(Status::class, $result);
        $this->assertEquals(PlaybackState::PLAYING, $result->getState());
    }

    /**
     * @test
     */
    public function testCurrent()
    {
        $result = $this->testable->getCurrent();
        $this->assertInstanceOf(Track::class, $result);
        $this->assertEquals('test', $result->getTitle());
    }

    /**
     * @test
     */
    public function testNext()
    {
        $this->assertEquals($this->testable, $this->testable->next());
    }

    /**
     * @test
     */
    public function testPrevious()
    {
        $this->assertEquals($this->testable, $this->testable->previous());
    }

    /**
     * @test
     */
    public function testPlay()
    {
        $this->assertEquals($this->testable, $this->testable->play());
    }

    /**
     * @test
     */
    public function testToggle()
    {
        $this->assertEquals($this->testable, $this->testable->toggle());
    }

    /**
     * @test
     */
    public function testPause()
    {
        $this->assertEquals($this->testable, $this->testable->pause());
    }

    /**
     * @test
     */
    public function testUpdate()
    {
        $this->assertEquals($this->testable, $this->testable->updateDatabase());
    }

    /**
     * @test
     */
    public function testUpdateAsync()
    {
        $this->assertEquals($this->testable, $this->testable->updateDatabaseAsync());
    }

    /**
     * @test
     */
    public function testVolume()
    {
        $this->assertEquals($this->testable, $this->testable->setVolume(self::SUCCESS_VOLUME));
    }

    /**
     * @expectedException Smt\Pmpd\Exception\ClientExecutionException
     * @expectedExceptionMessage Failed to get response from MPD: fail
     */
    public function testFailVolume()
    {
        $this->testable->setVolume(self::FAIL_VOLUME);
    }

    /**
     * @expectedException Smt\Pmpd\Exception\ClientExecutionException
     * @expectedExceptionMessage Failed to connect to remote host
     */
    public function testConnectionFail()
    {
        $connection = $this->getMockBuilder(Connection::class)
            ->disableOriginalConstructor()
            ->getMock();
        $connection
            ->expects($this->any())
            ->method('send')
            ->withAnyParameters()
            ->willThrowException(new ConnectionEstablishmentException())
        ;
        $client = new DefaultClient($connection);
        $client->query('test');
    }
}
