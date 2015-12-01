Smt\Pmpd\Connection\Connection
==============================

Represents low-level connection to MPD server

Methods
-------

`Connection#send($command, ...$arguments)` - send command with specified arguments to server, `Response` is returned

`Connection#setConfiguration(HostConfiguration $config)` - set connection configuration, fluent

Example
-------

    /// \var Connection $connection
    /// \var HostConfiguration $config
    
    $connection->setConfiguration($config);
    var_dump($connection->send(Commands::STATUS)); // Response
    var_dump($connection->send(Commands::SET_VOLUME, 10)) // Response
    