<?php

namespace Smt\Pmpd\Exception;

/**
 * Thrown on error while execution some command via client
 * @package Smt\Pmpd\Exception
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
class ClientExecutionException extends \Exception
{
    /**
     * Constructor.
     * @param string $message Exception message
     * @param \Exception $previous Previous exception
     */
    public function __construct($message, \Exception $previous = null)
    {
        parent::__construct($message, 0, $previous);
    }
}
