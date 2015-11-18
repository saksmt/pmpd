<?php

namespace Smt\Pmpd\Response\Impl;

use Smt\Pmpd\Response\Response;

/**
 * Represents socket response
 * @package Smt\Pmpd\Response\Impl
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
class SocketResponse implements Response
{
    protected $responseData = [];
    private $empty = false;
    const ACK_PATTERN = '/^ACK\ \[([0-9]+)\@([0-9]+)\]\ \{(\w+)\}\ (.*)$/';

    /**
     * Constructor.
     * @param array $raw
     */
    private function __construct(array $raw)
    {
        if (count($raw) == 0) {
            $this->empty = true;
        }
        foreach ($raw as $responseLine) {
            preg_match('/(\w+)\:\ (.*)$/', $responseLine, $matches);
            $this->responseData[$matches[1]] = $matches[2];
        }
    }

    /**
     * Create response from raw one
     * @param array $raw Raw data (lines)
     * @return FailSocketResponse|SocketResponse
     */
    public static function fromRaw(array $raw)
    {
        $last = $raw[count($raw) - 2];
        if (strncmp($last, 'ACK', 3) === 0) {
            return self::produceFailResponse($last);
        }
        array_pop($raw);
        array_pop($raw);
        return new self($raw);
    }

    /** {@inheritdoc} */
    public function isEmpty()
    {
        return $this->empty;
    }

    /** {@inheritdoc} */
    public function get($key, $default = null)
    {
        if (isset($this->responseData[$key])) {
            return $this->responseData[$key];
        }
        return $default;
    }

    /**
     * @param string $error Error string
     * @return FailSocketResponse
     */
    private static function produceFailResponse($error)
    {
        preg_match(self::ACK_PATTERN, $error, $matches);
        return FailSocketResponse::create()
            ->setErrorCode($matches[1])
            ->setLineNumber($matches[2])
            ->setCommand($matches[3])
            ->setMessage($matches[4])
        ;
    }
}
