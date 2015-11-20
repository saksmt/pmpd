<?php

namespace Smt\Pmpd\Entity\Impl;

use Smt\Pmpd\Entity\Track;

/**
 * Represents track
 * @package Smt\Pmpd\Entity\Impl
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
class DefaultTrack implements Track
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $artist;

    /**
     * @var string
     */
    protected $album;

    /**
     * @var string
     */
    protected $genre;

    /**
     * @var string
     */
    protected $file;

    /**
     * @var int
     */
    protected $date;

    /**
     * @var int
     */
    protected $track;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title Title
     * @return DefaultTrack This instance
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * @param string $artist Artist
     * @return DefaultTrack This instance
     */
    public function setArtist($artist)
    {
        $this->artist = $artist;
        return $this;
    }

    /**
     * @return string
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * @param string $album Album
     * @return DefaultTrack This instance
     */
    public function setAlbum($album)
    {
        $this->album = $album;
        return $this;
    }

    /**
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param string $genre Genre
     * @return DefaultTrack This instance
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
        return $this;
    }

    /**
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param string $file File
     * @return DefaultTrack This instance
     */
    public function setFile($file)
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @return int
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param int $date Date
     * @return DefaultTrack This instance
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return int
     */
    public function getTrack()
    {
        return $this->track;
    }

    /**
     * @param int $track Track number
     * @return DefaultTrack This instance
     */
    public function setTrack($track)
    {
        $this->track = $track;
        return $this;
    }
}
