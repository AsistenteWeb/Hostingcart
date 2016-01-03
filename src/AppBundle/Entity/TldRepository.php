<?php


namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class TldRepository extends EntityRepository
{
	public function getTldProductAsArray($tld, $action)
	{

		return $this->createQueryBuilder('tld')
			->addSelect('domainprovider')
			->innerJoin('tld.domainproduct', 'domainproduct')
			->innerJoin('tld.domainprovider', 'domainprovider')
			->innerJoin('domainproduct.domainaction', 'domainaction')
			->where('tld.tld =:tld')
			->andWhere('domainaction.alias =:alias')
			->setParameter('tld', $tld)
			->setParameter('alias', $action)
			->getQuery()
			->getResult();
	}

	public function listPlans()
	{
		return
			$this->getEntityManager()->createQueryBuilder()
			    ->select('tld.id')
			    ->addSelect('tld.tld')
				->addSelect('tld.enable')
//				->addSelect('tld.transfer_from')
			    ->addSelect("MAX(CASE WHEN (domainaction.alias = 'register') THEN (domainproduct.price) ELSE -1 END ) AS register")
			    ->addSelect("MAX(CASE WHEN (domainaction.alias = 'renew') THEN (domainproduct.price) ELSE -1 END ) AS renew")
			    ->addSelect("MAX(CASE WHEN (domainaction.alias = 'redemption') THEN (domainproduct.price) ELSE -1 END ) AS redemption")
			    ->from('AppBundle:Tld', 'tld')
			    ->innerJoin('tld.domainproduct', 'domainproduct')
			    ->innerJoin('domainproduct.domainaction', 'domainaction', 'WITH', "domainaction.alias = 'register' OR domainaction.alias = 'renew' OR domainaction.alias = 'redemption' ")
			    ->orderBy('tld.tld')
			    ->groupBy('tld.id')
			    ->getQuery()
			    ->getResult()
			;
	}

	public function listTldRegisterPrices()
	{
		return
			$this->getEntityManager()->createQueryBuilder()
				->select('tld.id')
				->addSelect('tld.tld')
				->addSelect('domainproduct.price')
				->from('AppBundle:Tld', 'tld')
				->innerJoin('tld.domainproduct', 'domainproduct')
				->innerJoin('domainproduct.domainaction', 'domainaction', 'WITH', "domainaction.alias = 'register'")
				->orderBy('tld.tld')
				->getQuery()
				->getResult()
			;
	}
}