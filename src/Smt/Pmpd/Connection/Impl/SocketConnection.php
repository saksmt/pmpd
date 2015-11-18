<?php

namespace Smt\Pmpd\Connection\Impl;

use Smt\Pmpd\Configuration\HostConfiguration;
use Smt\Pmpd\Connection\StatefulConnection;
use Smt\Pmpd\Exception\ConnectionEstablishmentException;
use Smt\Pmpd\Exception\ConnectionNotEstablishedException;
use Smt\Pmpd\Response\Impl\SocketResponse;
use Smt\Pmpd\Util\BufferedSocketReader;

/**
 * Represents socket connection
 * @package Smt\Pmpd\Connection\Impl
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
class SocketConnection implements StatefulConnection
{
    const BUFFER_SIZE = 8;

    /**
     * @var HostConfiguration
     */
    private $configuration;

    /**
     * @var resource
     */
    private $socket;

    /**
     * @var BufferedSocketReader
     */
    private $reader;

    /** {@inheritdoc} */
    public function setConfiguration(HostConfiguration $configuration)
    {
        $this->close();
        $this->configuration = $configuration;
        return $this;
    }

    /** {@inheritdoc} */
    public function send($command, ...$arguments)
    {
        $this->checkConnection();
        fputs($this->socket, $this->prepareCommand($command, $arguments));
        return SocketResponse::fromRaw(explode("\n", $this->reader->readAll()));
    }

    /** {@inheritdoc} */
    public function open()
    {
        $this->socket = fsockopen(
            $this->configuration->getHost(),
            $this->configuration->getPort(),
            $errorCode,
            $errorMessage
        );
        if ($this->socket === false) {
            $this->socket = null;
            throw new ConnectionEstablishmentException(sprintf(
                'Error connecting to mpd://%s - "%s" (%d)',
                $this->configuration,
                $errorMessage,
                $errorCode
            ));
        }
        $this->reader = new BufferedSocketReader($this->socket, self::BUFFER_SIZE);
        $this->reader->readAll();
        $this->authorize();
        return $this;
    }

    /** {@inheritdoc} */
    public function close()
    {
        if (isset($this->socket)) {
            fclose($this->socket);
            $this->socket = null;
        }
        return $this;
    }

    /** {@inheritdoc} */
    public function isConnected()
    {
        return isset($this->socket);
    }

    private function authorize()
    {
        if ($this->configuration->getPassword() === null) {
            return;
        }
        // TODO: write implementation
    }

    /**
     * @throws ConnectionEstablishmentException
     * @throws ConnectionNotEstablishedException
     */
    private function checkConnection()
    {
        if (!$this->isConnected()) {
            throw new ConnectionNotEstablishedException();
        }
        $retries = 5;
        while ($retries > 0 && feof($this->socket)) {
            $retries--;
            $this->close();
            $this->open();
        }
        if ($retries === 0) {
            throw new ConnectionEstablishmentException('Failed to send data: maximum retries amount reached...');
        }
    }

    /**
     * @param string $command
     * @param string[] $arguments
     * @return string
     */
    private function prepareCommand($command, $arguments)
    {
        return $command . ' "' . implode('" "', array_map(function ($argument) {
            return str_replace('"', '\\"', $argument);
        }, $arguments)) . "\"\n";
    }
}
