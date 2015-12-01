Smt\Pmpd\Connection\StatefulConnection
======================================

Represents connection that can be opened and closed

**Extends:** Connection

Methods
-------

`StatefulConnection#open()` - Open connection, fluent

`StatefulConnection#close()` - Close connection, fluent

Example
-------

    // \var StatefulConnection $connection
    
    $connection->open()->close();
    