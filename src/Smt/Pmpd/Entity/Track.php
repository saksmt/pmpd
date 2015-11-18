<?php

namespace Smt\Pmpd\Entity;

/**
 * Represents track
 * @package Smt\Pmpd\Entity
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
class Track
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $artist;

    /**
     * @var string
     */
    private $album;

    /**
     * @var string
     */
    private $genre;

    /**
     * @var string
     */
    private $file;

    /**
     * @var int
     */
    private $date;

    /**
     * @var int
     */
    private $track;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title Title
     * @return Track This instance
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
     * @return Track This instance
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
     * @return Track This instance
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
     * @return Track This instance
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
     * @return Track This instance
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
     * @return Track This instance
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
     * @return Track This instance
     */
    public function setTrack($track)
    {
        $this->track = $track;
        return $this;
    }
}
