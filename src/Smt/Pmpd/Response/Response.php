<?php

namespace Smt\Pmpd\Response;

/**
 * Represents MPD response
 * @package Smt\Pmpd\Response
 * @author Kirill Saksin <kirillsaksin@yandex.ru>
 */
interface Response
{
    /**
     * Get response value
     * @param string $key Response key
     * @param mixed $default Default value to return if key doesn't exist
     * @return number|string|mixed|null
     */
    public function get($key, $default = null);

    /**
     * Check whether response is empty
     * @return bool
     */
    public function isEmpty();
}
