<?php

namespace Smt\Util;

require_once __DIR__ . '/stubs.php';

use Smt\Pmpd\Util\BufferedSocketReader;

/**
 * Test for @a BufferedSocketReader
 * @package Smt\Util
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
class BufferedSocketReaderTest extends \PHPUnit_Framework_TestCase
{
    const DATA = "test\nOK\n";
    private static $read = false;

    /**
     * @test
     */
    public function testReadAll()
    {
        $reader = new BufferedSocketReader(true);
        $this->assertEquals(self::DATA, $reader->readAll());
        $reader = new BufferedSocketReader(false);
        $this->assertEquals(self::DATA . ' ', $reader->readAll());
    }

    /**
     * fgets
     * @param resource|bool $socket Stub or real resource
     * @return bool|string
     */
    public static function read($socket)
    {
        if (!is_bool($socket)) {
            return \fgets($socket);
        }
        if ($socket) {
            return self::DATA;
        } elseif (!self::$read) {
            self::$read = true;
            return self::DATA . ' ';
        } else {
            return false;
        }
    }
}