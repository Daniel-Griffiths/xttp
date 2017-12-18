<?php

namespace DanielGriffiths\Xttp;

/**
 * @package Xttp
 * @author Daniel Griffiths (daniel-griffiths)
 */
class Xttp
{   
    /**
     * A facade to call any non static methods
     * statically on the XttpRequest class.
     * 
     * @param  mixed $method 
     * @param  mixed $args   
     * @return mixed
     */
    static function __callStatic($method, $args)
    {
        return (new XttpRequest)->{$method}(...$args);
    }
}
