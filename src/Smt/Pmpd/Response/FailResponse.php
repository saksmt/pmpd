<?php

namespace Smt\Pmpd\Response;

/**
 * Represents failed response
 * @package Smt\Pmpd\Response
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
interface FailResponse extends Response
{
    /**
     * Get executed command
     * @return string
     */
    public function getCommand();

    /**
     * Get line number
     * @return int
     */
    public function getLineNumber();

    /**
     * Get error message
     * @return string
     */
    public function getMessage();

    /**
     * Get error code
     * @return number
     */
    public function getErrorCode();
}
