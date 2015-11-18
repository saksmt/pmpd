<?php

namespace Smt\Pmpd\Configuration;

/**
 * Represents host configuration
 * @package Smt\Pmpd\Configuration
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
class HostConfiguration
{
    /**
     * @var string
     */
    private $host = 'localhost';

    /**
     * @var int
     */
    private $port = 6600;

    /**
     * @var string|null
     */
    private $password;

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param string $host Host address
     * @return HostConfiguration
     */
    public function setHost($host)
    {
        $this->host = $host;
        return $this;
    }

    /**
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param int $port Port
     * @return HostConfiguration
     */
    public function setPort($port)
    {
        $this->port = $port;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password Password
     * @return HostConfiguration
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getHost() . ':' . $this->getPort();
    }
}
