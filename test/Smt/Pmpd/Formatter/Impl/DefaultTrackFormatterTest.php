<?php

namespace Smt\Pmpd\Formatter\Impl;

use Smt\Pmpd\Entity\Impl\DefaultTrack;

class DefaultTrackFormatterTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $track = (new DefaultTrack())
            ->setAlbum('album')
            ->setArtist('artist')
            ->setDate(2015)
            ->setFile('file')
            ->setGenre('genre')
            ->setTitle('title')
            ->setTrack(0)
        ;
        $formatter = new DefaultTrackFormatter();
        $formatter->setFormat('%album %artist %date %file %genre %title %track');
        $this->assertEquals('album artist 2015 file genre title 0', $formatter->format($track));
    }
}
