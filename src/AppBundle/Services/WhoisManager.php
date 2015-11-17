<?php

namespace AppBundle\Services;


use Aw\WhoisBundle\Whois\AwWhois;
use Doctrine\ORM\EntityManager;

class WhoisManager
{
	private $awWhois;
	private $domainProduct;
	private $domain;
	private $tldRepo;

	function __construct( AwWhois $awWhois, EntityManager $em )
	{
		$this->awWhois = $awWhois;
		$this->tldRepo = $em->getRepository('AppBundle:Domainproduct');
	}

	public function checkDomain( $domain )
	{
		$this->setDomain($domain);
		$this->isTldExistsForSell();
		$this->isEnableForSell();
		$this->isApi();
		$this->isValid();
		$this->isAvailable();

		return true;
	}

	private function setDomain( $domain ) {
		$this->awWhois->setDomain($domain);
		$this->domain = $domain;

		return $this;
	}


	private function isTldExistsForSell()
	{
		if (!($this->domainProduct = $this->tldRepo->getTldProductAsArray($this->awWhois->getTLDs(), 'register'))) {
			throw new \Exception('El dominio no esta en la lista de dominios a la venta');
		}
		return true;
	}

	private function isEnableForSell()
	{
		if($this->domainProduct[0]->getTld()->getEnable() != true) {
			throw new \Exception('El dominio no está habilitado para la venta');
		}
		return true;
	}

	private function isApi()
	{
		if($this->domainProduct[0]->getTld()->getDomainprovider()->getApi() != true) {
			throw new \Exception('El dominio no se puede registrar automáticamente');
		}
		return true;
	}

	private function isValid()
	{
		if (!$this->awWhois->isValid()) {
			throw new \Exception('El dominio no se puede verificar si se encuentra disponible automáticamente');
		}
	}

	private function isAvailable()
	{
		if (!$this->awWhois->isAvailable()) {
			throw new \Exception('El dominio no se encuentra disponible');
		}
	}
}