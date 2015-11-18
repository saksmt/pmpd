<?php

namespace Smt\Pmpd\Connection;

use Smt\Pmpd\Configuration\HostConfiguration;
use Smt\Pmpd\Connection\Impl\SocketConnection;
use Smt\Pmpd\Exception\ConnectionEstablishmentException;

/**
 * Creates connections
 * @package Smt\Pmpd\Connection
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
class ConnectionFactory
{
    /**
     * @var \SplObjectStorage<HostConfiguration, SocketConnection>
     */
    private $cache;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->cache = new \SplObjectStorage();
    }

    /**
     * Create new connection
     * @param HostConfiguration $configuration Connection Configuration
     * @return SocketConnection
     * @throws ConnectionEstablishmentException
     */
    public function createConnection(HostConfiguration $configuration)
    {
        if ($this->cache->offsetExists($configuration)) {
            return $this->cache->offsetGet($configuration);
        }
        $connection = new SocketConnection();
        $connection->setConfiguration($configuration);
        $connection->open();
        $this->cache->attach($configuration, $connection);
        return $connection;
    }
}
