<?php

namespace Smt\Pmpd\Response\Impl;

use Smt\Pmpd\Response\FailResponse;

/**
 * Represents failed socket response
 * @package Smt\Pmpd\Response\Impl
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
class FailSocketResponse extends SocketResponse implements FailResponse
{
    const LINE_KEY = 'lineNumber';
    const COMMAND_KEY = 'command';
    const MESSAGE_KEY = 'message';
    const CODE_KEY = 'errorCode';

    /**
     * Constructor.
     */
    private function __construct()
    {
    }

    /** {@inheritdoc} */
    public function getCommand()
    {
        return $this->get(self::COMMAND_KEY);
    }

    /** {@inheritdoc} */
    public function getLineNumber()
    {
        return $this->get(self::LINE_KEY);
    }

    /** {@inheritdoc} */
    public function getMessage()
    {
        return $this->get(self::MESSAGE_KEY);
    }

    /** {@inheritdoc} */
    public function getErrorCode()
    {
        return $this->get(self::CODE_KEY);
    }

    /**
     * Create new instance
     * @return FailSocketResponse
     */
    public static function create()
    {
        return new self();
    }

    /**
     * Set error command
     * @param string $command Command
     * @return FailSocketResponse
     */
    public function setCommand($command)
    {
        $this->responseData[self::COMMAND_KEY] = $command;
        return $this;
    }

    /**
     * Set line
     * @param int $line Line
     * @return FailSocketResponse
     */
    public function setLineNumber($line)
    {
        $this->responseData[self::LINE_KEY] = $line;
        return $this;
    }

    /**
     * Set error message
     * @param string $message Message
     * @return FailSocketResponse
     */
    public function setMessage($message)
    {
        $this->responseData[self::MESSAGE_KEY] = $message;
        return $this;
    }

    /**
     * Set error code
     * @param int $code Code
     * @return FailSocketResponse
     */
    public function setErrorCode($code)
    {
        $this->responseData[self::CODE_KEY] = $code;
        return $this;
    }
}
