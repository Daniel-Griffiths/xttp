<?php

namespace DanielGriffiths\Xttp;

class XttpRequest
{
	/**
	* The curl instance.
	* 
	* @var curl
	*/
	protected $ch;

	/**
	* Create a new get request.
	* 
	* @param  string $url
	* @param  array $data
	* @return self
	*/
	public function get($url, $data = [])
	{
		return $this->request('get', $url, $data);
	}

	/**
	* Create a new post request.
	* 
	* @param  string $url
	* @param  array $data
	* @return self
	*/
	public function post($url, $data = [])
	{
		return $this->request('post', $url, $data);
	}

	/**
	* Create a new get request.
	* 
	* @param  string $url
	* @param  array $data
	* @return curl
	*/
	public function request($type, $url, $data = [])
	{
		$this->ch = curl_init();
		curl_setopt_array($this->ch, [
			CURLOPT_URL => $url,
			CURLOPT_VERBOSE => 0,
			CURLOPT_FAILONERROR => 1,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
			CURLOPT_POST => ($type == 'post') ? 1 : 0,
			CURLOPT_HTTPHEADER => ['Content-Type:application/json']
		]);
		return $this;
	}

	/**
	* Send the request.
	* 
	* @return mixed
	*/
	public function send()
	{   		
		return json_decode(
			curl_exec($this->ch)
		); 
	}

	/**
	* Set the curl options.
	* 
	* @param  array $options
	* @return self
	*/
	public function withOptions($options)
	{
		curl_setopt_array($this->ch, $options);
		return $this;
	}
}
