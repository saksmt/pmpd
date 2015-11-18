<?php

namespace Smt\Pmpd\Client;

use Smt\Pmpd\Entity\Status;
use Smt\Pmpd\Entity\Track;
use Smt\Pmpd\Exception\ClientExecutionException;
use Smt\Pmpd\Response\Response;

/**
 * Simple client for interacting with MPD
 * TODO: Rewrite to complex facade with parts for
 * TODO: database, playlist and proxied status
 * @package Smt\Pmpd\Client
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
interface Client
{
    /**
     * Get status
     * @return Status
     * @throws ClientExecutionException
     */
    public function getStatus();

    /**
     * Get current track
     * @return Track
     * @throws ClientExecutionException
     */
    public function getCurrent();

    /**
     * Next track
     * @return Client This instance
     * @throws ClientExecutionException
     */
    public function next();

    /**
     * Previous track
     * @return Client This instance
     * @throws ClientExecutionException
     */
    public function previous();

    /**
     * Set volume
     * @param int $volume Volume
     * @return Client This instance
     * @throws ClientExecutionException
     */
    public function setVolume($volume);

    /**
     * Toggle play/pause
     * @return Client This instance
     * @throws ClientExecutionException
     */
    public function toggle();

    /**
     * Pause playback
     * @return Client This instance
     * @throws ClientExecutionException
     */
    public function pause();

    /**
     * Continue playback
     * @return Client This instance
     * @throws ClientExecutionException
     */
    public function play();

    /**
     * Asynchronously update MPD database
     * @return Client This instance
     * @throws ClientExecutionException
     */
    public function updateDatabaseAsync();

    /**
     * Synchronously update MPD database
     * @return Client This instance
     * @throws ClientExecutionException
     */
    public function updateDatabase();

    /**
     * Perform custom query
     * @param string $command Command to execute
     * @param string[] ...$arguments Command arguments
     * @return Response
     * @throws ClientExecutionException
     */
    public function query($command, ...$arguments);
}
