<?php

namespace Smt\Pmpd\Connection;

use Smt\Pmpd\Exception\ConnectionEstablishmentException;

/**
 * Represents stateful connection like socket one
 * @package Smt\Pmpd\Connection
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
interface StatefulConnection extends Connection
{
    /**
     * Try to open connection
     * @return StatefulConnection
     * @throws ConnectionEstablishmentException
     */
    public function open();

    /**
     * Close connection
     * @return StatefulConnection
     */
    public function close();

    /**
     * Check whether connection is established
     * @return bool
     */
    public function isConnected();
}
