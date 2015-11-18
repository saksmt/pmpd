<?php

namespace Smt\Pmpd\Entity\Enum;

use Smt\Util\Enumeration\EnumerationTrait;

/**
 * Represents playback state
 * @package Smt\Pmpd\Entity\Enum
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
class PlaybackState
{
    const STOPPED = 0;
    const PLAYING = 1;
    const PAUSED = 2;

    /**
     * Parse state from raw response
     * @param string $raw Raw response
     * @return int Member of enum
     */
    public static function parse($raw)
    {
        if ($raw == 'stop') {
            return self::STOPPED;
        } elseif ($raw == 'pause') {
            return self::PAUSED;
        } elseif ($raw == 'play') {
            return self::PLAYING;
        }
        return 3;
    }

    use EnumerationTrait;
}
