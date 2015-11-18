<?php

namespace Smt\Pmpd\Entity;

/**
 * Represents status
 * @package Smt\Pmpd\Entity
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
class Status
{
    /**
     * @var int
     */
    private $volume;

    /**
     * @var bool
     */
    private $repeat;

    /**
     * @var bool
     */
    private $random;

    /**
     * @var bool
     */
    private $single;

    /**
     * @var bool
     */
    private $consume;

    /**
     * @var int
     */
    private $playlist;

    /**
     * @var int
     */
    private $playlistCount;

    /**
     * @var int
     */
    private $state;

    /**
     * @return int
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @param int $volume Volume
     * @return Status This instance
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;
        return $this;
    }

    /**
     * @return bool
     */
    public function isRepeat()
    {
        return $this->repeat;
    }

    /**
     * @param bool $repeat Repeat
     * @return Status This instance
     */
    public function setRepeat($repeat)
    {
        $this->repeat = !!$repeat;
        return $this;
    }

    /**
     * @return bool
     */
    public function isRandom()
    {
        return $this->random;
    }

    /**
     * @param bool $random Random
     * @return Status This instance
     */
    public function setRandom($random)
    {
        $this->random = !!$random;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSingle()
    {
        return $this->single;
    }

    /**
     * @param bool $single Single
     * @return Status This instance
     */
    public function setSingle($single)
    {
        $this->single = !!$single;
        return $this;
    }

    /**
     * @return bool
     */
    public function isConsume()
    {
        return $this->consume;
    }

    /**
     * @param bool $consume Consume
     * @return Status This instance
     */
    public function setConsume($consume)
    {
        $this->consume = !!$consume;
        return $this;
    }

    /**
     * @return int
     */
    public function getPlaylist()
    {
        return $this->playlist;
    }

    /**
     * @param int $playlist Playlist ID
     * @return Status This instance
     */
    public function setPlaylist($playlist)
    {
        $this->playlist = $playlist;
        return $this;
    }

    /**
     * @return int
     */
    public function getPlaylistCount()
    {
        return $this->playlistCount;
    }

    /**
     * @param int $playlistCount Count of tracks in playlist
     * @return Status This instance
     */
    public function setPlaylistCount($playlistCount)
    {
        $this->playlistCount = $playlistCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param int $state Playback state
     * @return Status This instance
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }
}
