# Base

## Connection

[`Smt\Pmpd\Connection\ConnectionFactory`](https://github.com/saksmt/pmpd/blob/develop/doc/base/connection/ConnectionFactory.md) - Creates and stores new connections to MPD

[`Smt\Pmpd\Connection\Connection`](https://github.com/saksmt/pmpd/blob/develop/doc/base/connection/Connection.md) - Interface of connection, provides ability to send commands to MPD

## Response

[`Smt\Pmpd\Response\Response`](https://github.com/saksmt/pmpd/blob/develop/doc/base/response/Response.md) - Represents response from MPD

[`Smt\Pmpd\Response\FailResponse`](https://github.com/saksmt/pmpd/blob/develop/doc/base/response/FailResponse.md) - Represents error response from MPD

## Misc

[`Smt\Pmpd\Connection\Commands`](https://github.com/saksmt/pmpd/blob/develop/doc/base/misc/Commands.md) - List of available commands

[`Smt\Pmpd\Configuration\HostConfiguration`](https://github.com/saksmt/pmpd/blob/develop/doc/base/misc/HostConfiguration.md) - Represents configuration for connection

## Exceptions

[`Smt\Pmpd\Exception\ConnectionException`](https://github.com/saksmt/pmpd/blob/develop/doc/base/exceptions/ConnectionException.md) - Base exception for all connection-related ones

[`Smt\Pmpd\Exception\ConnectionEstablishmentException`](https://github.com/saksmt/pmpd/blob/develop/doc/base/exceptions/ConnectionEstablishmentException.md) - Thrown on errors while attempting to establish connection

[`Smt\Pmpd\Exception\InvalidPasswordException`](https://github.com/saksmt/pmpd/blob/develop/doc/base/exceptions/InvalidPasswordException) - Thrown when connecting with invalid password

# Low-level

## Connection

[`Smt\Pmpd\Connection\StatefulConnection`](https://github.com/saksmt/pmpd/blob/develop/doc/low-level/connection/StatefulConnection) - Interface of connection that can be opened/closed

### Exceptions

[`Smt\Pmpd\Exception\ConnectionNotEstablishedException`](https://github.com/saksmt/pmpd/blob/develop/doc/low-level/connection/exceptions/ConnectionNotEstablishedException.md) - Thrown when trying to manipulate on closed connection

# High-level

## Client

[`Smt\Pmpd\Client\Client`](https://github.com/saksmt/pmpd/blob/develop/doc/high-level/client/Client.md) - High-level client interface to MPD

[`Smt\Pmpd\Client\Impl\DefaultClient`](https://github.com/saksmt/pmpd/blob/develop/doc/high-level/client/DefaultClient.md) - Default implementation of client to MPD

### Exceptions

[`Smt\Pmpd\Exception\ClientExecutionException`](https://github.com/saksmt/pmpd/blob/develop/doc/high-level/client/exceptions/ClientExecutionException.md) - Thrown on error while executing client

## Entities

[`Smt\Pmpd\Entity\Status`](https://github.com/saksmt/pmpd/blob/develop/doc/high-level/entities/Status.md) - Represents MPD status

[`Smt\Pmpd\Entity\Track`](https://github.com/saksmt/pmpd/blob/develop/doc/high-level/entities/Track.md) - Represents track

## Formatter

[`Smt\Pmpd\Formatter\TrackFormatter`](https://github.com/saksmt/pmpd/blob/develop/doc/high-level/formatter/TrackFormatter.md) - Interface for converting track to string by specified format

[`Smt\Pmpd\Formatter\Impl\DefaultTrackFormatter`](https://github.com/saksmt/pmpd/blob/develop/doc/high-level/formatter/DefaultTrackFormatter.md) - Default implementation of track formatter

## Enumerations

[`Smt\Pmpd\Entity\Enum\PlaybackState`](https://github.com/saksmt/pmpd/blob/develop/doc/high-level/enumerations/PlaybackState) - Contains list of playback statuses
