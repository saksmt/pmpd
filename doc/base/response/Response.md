Smt\Pmpd\Repsponse\Response
===========================

Represents response from MPD

Methods
-------

`Response#isEmpty()` - Checks whether response is empty

`Response#get(string $fieldName, mixed $defaultValue = null)` - Get field of response by name and return default value if nothing is set

Example
-------

    // Assume $response with status information
    /// \var Response $response
    
    var_dump($response->isEmpty()); // false
    var_dump($response->get('volume')); // 42
    var_dump($response->get('nonExistentField', 'thisWouldBeReturned')); // 'thisWouldBeReturned'
    