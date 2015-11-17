<?php


namespace Aw\ResellerclubBundle\Services;


class Connect
{
	private $test;
	private $authUserId;
	private $apiKey;

	public function __construct( $test, $authUserId, $apiKey ) {
		$this->test       = $test;
		$this->authUserId = $authUserId;
		$this->apiKey     = $apiKey;
	}

	public function send($apiSet, $function, $options)
	{
//		https://test.httpapi.com/api/contacts/add.json?auth-userid=0&api-key=key&
//		https://test.httpapi.com/api/domains/available.json

		$command = sprintf(
			"https://%shttpapi.com/api/%s/%s.json?auth-userid=%s&api-key=%s&%s",
			$this->test ? 'test.':'',
			$apiSet,
			$function,
			$this->authUserId,
			$this->apiKey,
			http_build_query($options)
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $command);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$httpResponse = curl_exec($ch);
		dump($httpResponse);
	}
}