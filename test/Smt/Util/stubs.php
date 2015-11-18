<?php
/**
 * Stub functions
 * @SuppressWarnings(PHPMD)
 */

namespace Smt\Pmpd\Util;

use Smt\Util\BufferedSocketReaderTest;

define('UNLOAD_READER_STUB', true);

function fgets($socket)
{
    return BufferedSocketReaderTest::read($socket);
}