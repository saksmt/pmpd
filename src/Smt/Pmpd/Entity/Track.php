<?php
namespace Smt\Pmpd\Entity;

/**
 * Represents track
 * @package Smt\Pmpd\Entity
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
interface Track
{
    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $title Title
     * @return Track This instance
     */
    public function setTitle($title);

    /**
     * @return string
     */
    public function getArtist();

    /**
     * @param string $artist Artist
     * @return Track This instance
     */
    public function setArtist($artist);

    /**
     * @return string
     */
    public function getAlbum();

    /**
     * @param string $album Album
     * @return Track This instance
     */
    public function setAlbum($album);

    /**
     * @return string
     */
    public function getGenre();

    /**
     * @param string $genre Genre
     * @return Track This instance
     */
    public function setGenre($genre);

    /**
     * @return string
     */
    public function getFile();

    /**
     * @param string $file File
     * @return Track This instance
     */
    public function setFile($file);

    /**
     * @return int
     */
    public function getDate();

    /**
     * @param int $date Date
     * @return Track This instance
     */
    public function setDate($date);

    /**
     * @return int
     */
    public function getTrack();

    /**
     * @param int $track Track number
     * @return Track This instance
     */
    public function setTrack($track);
}
