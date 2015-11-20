<?php

namespace Smt\Pmpd\Formatter\Impl;

use Smt\Pmpd\Entity\Track;
use Smt\Pmpd\Formatter\TrackFormatter;

/**
 * Default track formatter
 * @package Smt\Pmpd\Formatter\Impl
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
class DefaultTrackFormatter implements TrackFormatter
{

    /**
     * @var string
     */
    protected $format;

    /**
     * @var callable[]
     */
    private static $formatMap;

    /**
     * @var callable[]
     */
    protected $formatKeys;

    /**
     * @return callable[]
     */
    public static function getFormatKeys()
    {
        if (!isset(self::$formatMap)) {
            $accessor = function ($property) {
                return function (Track $track) use ($property) {
                    return $track->{'get' . ucfirst($property)}();
                };
            };
            self::$formatMap = array_map($accessor, [
                '%album' => 'album',
                '%artist' => 'artist',
                '%genre' => 'genre',
                '%title' => 'title',
                '%path' => 'file',
                '%file' => 'file',
                '%name' => 'title',
                '%date' => 'date',
                '%track' => 'track',
                '%t' => 'title',
                '%g' => 'genre',
                '%d' => 'date',
                '%c' => 'track',
                '%f' => 'file',
                '%n' => 'title',
                '%p' => 'path',
            ]);
        }
        return self::$formatMap;
    }

    /** {@inheritdoc} */
    public function format(Track $track)
    {
        $formatValues = array_map(function (callable $factory) use ($track) {
            return $factory($track);
        }, $this->formatKeys);
        return str_replace(array_keys($formatValues), $formatValues, $this->format);
    }

    /** {@inheritdoc} */
    public function setFormat($format)
    {
        $formatKeys = [];
        foreach (self::getFormatKeys() as $formatKey => $v) {
            if (strpos($format, $formatKey) !== false) {
                $formatKeys[$formatKey] = $v;
            }
        }
        $this->formatKeys = $formatKeys;
        $this->format = $format;
        return $this;
    }
}
