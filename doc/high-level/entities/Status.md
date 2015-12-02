Smt\Pmpd\Entity\Status
======================

Represents MPD status

Methods
-------

`Status#getVolume()` - Get volume level

`Status#setVolume(int volume)` - Set volume level, fluent

`Status#isRepeat()` - Check if playback is repeated

`Status#setRepeat(bool $repeat = true)` - Set playback repeat, fluent

`Status#isRandom()` - Check if playback is random

`Status#setRandom(bool $random = true)` - Set playback random, fluent

`Status#isSingle()` - Check if playback cycled at single track

`Status#setSingle(bool $single = true)` - Cycle playback on current track, fluent

`Status#isConsume()` - Check if playback is consume

`Status#setConsume(bool $consume = true)` - Set playback consume, fluent

`Status#getPlaylist()` - Get playlist ID

`Status#setPlaylist($id)` - Set playlist ID, fluent

`Status#getPlaylistCount()` - Get track count in playlist

`Status#setPlaylistCount(int $count)` - Set track count in playlist, fluent

`Status#getState()` - Get playback state

`Status#setState(int $state)` - Set playback state, fluent
