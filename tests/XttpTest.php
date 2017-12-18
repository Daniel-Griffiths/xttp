<?php

use PHPUnit\Framework\TestCase;
use DanielGriffiths\Xttp\Xttp;

class XttpTest extends TestCase
{   
    public function testGetCanBeSent()
    {
  		Xttp::get('https://www.reddit.com/r/games.json')->send();
    } 
}