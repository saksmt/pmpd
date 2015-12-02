Smt\Pmpd\Client\Impl\DefaultClient
==================================

Default implementation of `Client`

Methods
-------

`DefaultClient#__construct(Connection $connection)` - Constructor from connection

`DefaultClient#getStatus()` - Get MPD status

`DefaultClient#getCurrent()` - Get current track

`DefaultClient#next()` - Next track, fluent

`DefaultClient#previous()` - Previous track, fluent

`DefaultClient#setVolume(int $volume)` - Set volume level, fluent

`DefaultClient#toggle()` - Toggle play/pause, fluent

`DefaultClient#pause()` - Pause playback, fluent

`DefaultClient#play()` - Play, fluent

`DefaultClient#updateDatabaseAsync()` - Asynchronously update MPD database

`DefaultClient#updateDatabase()` - Synchronously update MPD database

`DefaultClient#query(string $command, ...$arguments)` - Execute command, returns `Response`

Example
-------

    /// \var Connection $connection
    
    $client = new DefaultClient($connection);
    
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
