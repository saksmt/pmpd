<?php
/**
 * Stub functions
 * @SuppressWarnings(PHPMD)
 */

namespace Smt\Pmpd\Connection\Impl;

function fsockopen($host, $port, &$errorCode, &$errorMessage)
{
    return SocketConnectionTest::checkOpenArguments($host, $port, $errorCode, $errorMessage);
}

function fputs(...$args)
{
    SocketConnectionTest::checkSendingArguments(...$args);
    return null;
}

function fclose()
{
}

function feof()
{
    return SocketConnectionTest::getFeofResponse();
}
