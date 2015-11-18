<?php

namespace Smt\Pmpd\Util;

/**
 * Reads all data from socket
 * @package Smt\Pmpd\Util
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
class BufferedSocketReader
{
    /**
     * @var resource
     */
    private $socket;

    /**
     * @var bool
     */
    private $okAppeared;

    /**
     * @var int
     */
    private $bufferSize;

    /**
     * @var string
     */
    private $result;

    /**
     * Constructor.
     * @param resource $socket Socket to read from
     * @param int $bufferSize Size of buffer
     */
    public function __construct($socket, $bufferSize = 64)
    {
        $this->socket = $socket;
        $this->bufferSize = $bufferSize;
    }

    /**
     * Read data from socket
     * @return string
     */
    public function readAll()
    {
        $this->okAppeared = false;
        $this->result = '';
        $this->doRead();
        return $this->result;
    }

    private function doRead()
    {
        while (true) {
            $buffer = fgets($this->socket, $this->bufferSize);
            if ($buffer === false) {
                return;
            }
            $this->result .= $buffer;
            if (!$this->okAppeared) {
                $this->okAppeared = strpos($this->result, 'OK') !== false || strpos($this->result, 'ACK') !== false;
            }
            if ($this->okAppeared && substr($buffer, -1) == "\n") {
                return;
            }
        }
    }
}
