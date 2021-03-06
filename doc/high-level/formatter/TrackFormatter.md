Smt\Pmpd\Formatter\TrackFormatter
=================================

Converts track object to string by specified format

Methods
-------

`TrackFormatter#format(Track $track)` - Formats track

`TrackFormatter#setFormat(string $format)` - Set format, fluent

Format reference
---------------- 

| Key    | Field  |
|--------|--------|
| album  | album  |
| artist | artist |
| genre  | genre  |
| title  | title  |
| path   | file   |
| file   | file   |
| name   | title  |
| date   | date   |
| track  | track  |
| t      | title  |
| g      | genre  |
| d      | date   |
| c      | track  |
| f      | file   |
| n      | title  |
| p      | path   |

Example
-------

    /// \var Track $track
    /// \var TrackFormatter $trackFormatter
    
    echo $formatter
        ->setFormat('%artist [%album] %t - %f')
        ->format($track)
    ; // 'Parkway Drive [Killing With A Smile] It\'s Hard To Speak Without A Tongue - 1.flac'
