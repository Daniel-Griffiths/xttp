# Xttp

A minimalist PHP Http client.

## Installation

```
composer require daniel-griffiths/xttp dev-master 
```

## Usage

By default Xttp assumes that any data sent/receieve is encoded in json. For an example of how to use this library please see the code below.


```PHP
<?php

require __DIR__.'/../vendor/autoload.php';

use DanielGriffiths\Xttp\Xttp;

// Post request
Xttp::post('https://myawesomeapi.com')->send();

// Get request
Xttp::get('https://myawesomeapi.com')->send();

// Sending data
Xttp::post('https://myawesomeapi.com', [
	'username' => 'Joe Blog',
	'email' => 'joe@blogs.com'
])->send();

// Custom Curl Options
Xttp::post('https://myawesomeapi.com', [
	'username' => 'Joe Blog',
	'email' => 'joe@blogs.com'
])->withOptions([
	CURLOPT_SSL_VERIFYPEER => 1,
	CURLOPT_SSL_VERIFYHOST => 2
])->send();
```