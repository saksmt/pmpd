<?php

namespace Smt\Pmpd\Formatter;

use Smt\Pmpd\Entity\Track;

/**
 * Track-related info formatter
 * @package Smt\Pmpd\Formatter
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
interface TrackFormatter
{
    /**
     * @param Track $track Track to format
     * @return string
     */
    public function format(Track $track);

    /**
     * @param string $format Info format
     * @return TrackFormatter
     */
    public function setFormat($format);
}
