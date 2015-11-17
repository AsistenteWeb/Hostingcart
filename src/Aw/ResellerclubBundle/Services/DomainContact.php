<?php

namespace Aw\ResellerclubBundle\Services;

use AppBundle\Interfaces\DomainContactInterface;
use Doctrine\ORM\EntityManager;

class DomainContact
{
	private $connect;

	public function __construct(Connect $connect)
	{
		$this->connect = $connect;
	}

	public function checkAndRegisterContact(DomainContactInterface $contact)
	{

	}

	public function searchContactByEmail(DomainContactInterface $contact)
	{

	}
}