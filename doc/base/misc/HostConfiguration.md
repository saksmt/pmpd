Smt\Pmpd\Configuration\HostConfiguration
========================================

Represents connection configuration

Defaults for `localhost:6600` without password

Methods
-------

`HostConfiguration#getHost()` - Get host for connection

`HostConfiguration#setHost(string $host)` - Set host for connection, fluent

`HostConfiguration#getPort()` - Get port for connection

`HostConfiguration#setPort(int $port)` - Set port for connection, fluent

`HostConfiguration#getPassword()` - Get password for connection 

`HostConfiguration#setPassword(string $password)` - Set password for connection, fluent 

`HostConfiguration#__toString()` - Get connection configuration as string

Example
-------

    $configuration = (new HostConfiguration())
        ->setHost('localhost')
        ->setPort(6600)
        ->setPassword('Hey!)
    ;
    echo $configuration; // 'localhost:6600'
    
