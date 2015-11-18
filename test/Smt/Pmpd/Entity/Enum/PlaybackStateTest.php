<?php

namespace Smt\Pmpd\Entity\Enum;

/**
 * Test enumeration parse method
 * @package Smt\Pmpd\Entity
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
class PlaybackStateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testPlaying()
    {
        $this->assertEquals(PlaybackState::PLAYING, PlaybackState::parse('play'));
    }

    /**
     * @test
     */
    public function testPaused()
    {
        $this->assertEquals(PlaybackState::PAUSED, PlaybackState::parse('pause'));
    }

    /**
     * @test
     */
    public function testStopped()
    {
        $this->assertEquals(PlaybackState::STOPPED, PlaybackState::parse('stop'));
    }

    /**
     * @test
     */
    public function testUnknown()
    {
        $this->assertEquals(3, PlaybackState::parse('unknown'));
    }
}
