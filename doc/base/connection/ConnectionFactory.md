Smt\Pmpd\Connection\ConnectionFactory
=====================================

Creates new connections

Methods
-------

`ConnectionFactory#createConnection(HostConfiguration $configuration)` - create new connection for specified configuration or get existing from pool


Example
-------

    /// \var HostConfiguration $configuration
    /// \var HostConfiguration $config
    
    $connectionFactory = new ConnectionFactory();
    $connection = $connectionFactory->createConnection($configuration);
    $anotherConnection = $connectionFactory->createConnection($configuration);
    $yetAnotherConnection = $connectionFactory->createConnection($config);
    
    var_dump($connection === $anotherConnection); // true
    var_dump($connection === $yetAnotherConnection); // false
    