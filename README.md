PMPD
====

PHP client library for Music Player Daemon

Prerequesties
-------------

 - PHP 5.6+
 - Running MPD :)

Installation
------------

    composer require smt/pmpd dev-develop

Usage
-----

    use Smt\Pmpd\Client\Impl\DefaultClient;
    use Smt\Pmpd\Configuration\HostConfiguration;
    use Smt\Pmpd\Connection\Commands;
    use Smt\Pmpd\Connection\ConnectionFactory;
    use Smt\Pmpd\Entity\Enum\PlaybackState;
    use Smt\Pmpd\Response\FailResponse;

    $connectionFactory = new ConnectionFactory();
    $config = new HostConfiguration();
    $config->setHost('127.0.0.1');
    $connection = $connectionFactory->createConnection($config);
    $client = new DefaultClient($connection);

    echo $client->getCurrent()->getTitle() . ' playing: ';
    echo $client->getStatus()->getState() == PlaybackState::PLAYING . PHP_EOL;
    $client->next();
    $client->toggle();
    $client->play();
    $client->updateDatabaseAsync();
    $response = $client->query(Commands::ADD_AND_RETURN_ID, 'Asking Alexandria - Not The American Average.flac', 1); // Add it to first position
    if ($response instanceof FailResponse) {
        echo 'Something gone wrong :(' . PHP_EOL . PHP_EOL . $response->getMessage();
    } else {
        echo 'Id in playlist:' . $response->get('Id') . PHP_EOL;
    }


Roadmap
-------

 - [ ] Implement connection with password;
 - [ ] Write API documentation;
 - [X] Cover with tests
 - [ ] Rewrite client to facade with subsystems;

License
-------

This library is licensed under [MIT license](https://github.com/saksmt/pmpd/blob/develop/LICENSE)