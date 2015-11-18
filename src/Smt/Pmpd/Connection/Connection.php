<?php

namespace Smt\Pmpd\Connection;

use Smt\Pmpd\Configuration\HostConfiguration;
use Smt\Pmpd\Response\Response;

/**
 * Represents connection to MPD
 * @package Smt\Pmpd\Connection
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
interface Connection
{
    /**
     * Set connection configuration
     * @param HostConfiguration $configuration Connection configuration
     * @return Connection
     */
    public function setConfiguration(HostConfiguration $configuration);

    /**
     * @param string $command Command to send to server
     * @param string[] ...$arguments Command arguments
     * @return Response
     */
    public function send($command, ...$arguments);
}
