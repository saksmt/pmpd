<?php

namespace Smt\Pmpd\Client\Impl;

use Smt\Pmpd\Client\Client;
use Smt\Pmpd\Connection\Commands;
use Smt\Pmpd\Connection\Connection;
use Smt\Pmpd\Entity\Enum\PlaybackState;
use Smt\Pmpd\Entity\Status;
use Smt\Pmpd\Entity\Track;
use Smt\Pmpd\Exception\ClientExecutionException;
use Smt\Pmpd\Exception\ConnectionException;
use Smt\Pmpd\Response\FailResponse;
use Smt\Pmpd\Response\Response;

/**
 * Simple MPD client
 * @package Smt\Pmpd\Client\Impl
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
class DefaultClient implements Client
{

    private $connection;

    /**
     * Constructor.
     * @param Connection $connection Connection to MPD
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /** {@inheritdoc} */
    public function getStatus()
    {
        $response = $this->handleFailResponse($this->query(Commands::GET_STATUS));
        return (new Status())
            ->setConsume($response->get('consume'))
            ->setPlaylist($response->get('playlist'))
            ->setPlaylistCount($response->get('playlistlength'))
            ->setRandom($response->get('random'))
            ->setRepeat($response->get('repeat'))
            ->setSingle($response->get('single'))
            ->setVolume($response->get('volume'))
            ->setState(PlaybackState::parse($response->get('state')))
        ;
    }

    /** {@inheritdoc} */
    public function getCurrent()
    {
        $response = $this->handleFailResponse($this->query(Commands::CURRENT));
        if ($response->isEmpty()) {
            return null;
        }
        return (new Track())
            ->setAlbum($response->get('Album'))
            ->setArtist($response->get('Artist'))
            ->setDate($response->get('Date'))
            ->setFile($response->get('file'))
            ->setGenre($response->get('Genre'))
            ->setTitle($response->get('Title'))
            ->setTrack($response->get('Track'))
        ;
    }

    /** {@inheritdoc} */
    public function next()
    {
        $this->handleFailResponse($this->query(Commands::NEXT));
        return $this;
    }

    /** {@inheritdoc} */
    public function previous()
    {
        $this->handleFailResponse($this->query(Commands::PREVIOUS));
        return $this;
    }

    /** {@inheritdoc} */
    public function setVolume($volume)
    {
        $this->handleFailResponse($this->query(Commands::SET_VOLUME, $volume));
        return $this;
    }

    /** {@inheritdoc} */
    public function toggle()
    {
        $this->handleFailResponse($this->query(Commands::PAUSE));
        return $this;
    }

    /** {@inheritdoc} */
    public function pause()
    {
        $this->handleFailResponse($this->query(Commands::PAUSE, 1));
        return $this;
    }

    /** {@inheritdoc} */
    public function play()
    {
        $this->handleFailResponse($this->query(Commands::PLAY));
        return $this;
    }

    /** {@inheritdoc} */
    public function updateDatabaseAsync()
    {
        $this->handleFailResponse($this->query(Commands::UPDATE));
        return $this;
    }

    /** {@inheritdoc} */
    public function updateDatabase()
    {
        $this->updateDatabaseAsync();
        $this->handleFailResponse($this->query(Commands::IDLE, Commands::UPDATE));
        return $this;
    }

    /** {@inheritdoc} */
    public function query($command, ...$arguments)
    {
        try {
            return $this->connection->send($command, ...$arguments);
        } catch (ConnectionException $e) {
            throw new ClientExecutionException('Failed to connect to remote host', $e);
        }
    }

    /**
     * @param Response $response
     * @throws ClientExecutionException
     * @return Response
     */
    private function handleFailResponse(Response $response)
    {
        if ($response instanceof FailResponse) {
            throw new ClientExecutionException(sprintf('Failed to get response from MPD: %s', $response->getMessage()));
        }
        return $response;
    }
}
