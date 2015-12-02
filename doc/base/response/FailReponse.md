Smt\Pmpd\Response\FailResponse
==============================

Represents error response from MPD

**Extends:** `Smt\Pmpd\Response\Response`

Methods
-------

`FailResponse#getCommand()` - Get command on which error occurred

`FailResponse#getLineNumber()` - Get line number on which error occurred

`FailResponse#getMessage()` - Get error message

`FailResponse#getErrorCode()` - Get error code returned by server

Example
-------

    // Assume we've sent `wrongCommand`
    /// \var FailResponse $response
    
    var_dump($response->getCommand()); // 'wrongCommand'
    var_dump($response->getLineNumber()); // 0
    var_dump($response->getMessage()); // 'unknown command "wrongCommand"'
    var_dump($response->getErrorCode()); // 5
    