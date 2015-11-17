<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Domainprovider;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadDomainprovider extends AbstractFixture implements OrderedFixtureInterface
{
	public function load( ObjectManager $manager )
	{
		$domainProvider = new Domainprovider();
		$domainProvider->setNameprovider('Reseller');
		$domainProvider->setModule('reseller');

		$manager->persist($domainProvider);
		$manager->flush();

		$this->setReference('domainprovider', $domainProvider);
	}

	public function getOrder()
	{
		return 1;
	}

}