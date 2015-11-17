<?php

namespace Aw\WhoisBundle\Whois;

use Phois\Whois\Whois;

class AwWhois extends Whois
{
	public function __construct(){}

	public function setDomain($domain)
	{
		parent::__construct($domain);
	}
}