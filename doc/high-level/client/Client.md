Smt\Pmpd\Client\Client
======================

High-level client interface for MPD

Methods
-------

`Client#getStatus()` - Get MPD status

`Client#getCurrent()` - Get current track

`Client#next()` - Next track, fluent

`Client#previous()` - Previous track, fluent

`Client#setVolume(int $volume)` - Set volume level, fluent

`Client#toggle()` - Toggle play/pause, fluent

`Client#pause()` - Pause playback, fluent

`Client#play()` - Play, fluent

`Client#updateDatabaseAsync()` - Asynchronously update MPD database

`Client#updateDatabase()` - Synchronously update MPD database

`Client#query(string $command, ...$arguments)` - Execute command, returns `Response`

Example
-------

    /// \var Client $client
    
    $client
        ->updateDatabase()
        ->setVolume(100)
        ->toggle()
    ;
    var_dump($client->getStatus()); // Status
    var_dump($client->getCurrent()); // Track
    
    $client
        ->pause()
        ->next()
        ->previous()
        ->play()
    ;
    
    var_dump($client->query(Command::SET_VOLUME, 0)); // Response
