<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class HostingplanRepository extends EntityRepository
{
	public function listPlans()
	{
		return
			$this->getEntityManager()->createQueryBuilder()
				->select('hostingplan.id')
				->addSelect('hostingplan.plan')
				->addSelect('hostingplan.description')
				->addSelect('hostingplan.alias')
				->addSelect('hostingplan.bandwidth')
				->addSelect('hostingplan.disksize')
				->addSelect("MAX(CASE WHEN (hostaction.alias = 'register') THEN (hostingproduct.price) ELSE -1 END ) AS register")
				->addSelect("MAX(CASE WHEN (hostaction.alias = 'renew') THEN (hostingproduct.price) ELSE -1 END ) AS renew")
				->from('AppBundle:Hostingplan', 'hostingplan')
				->innerJoin('hostingplan.hostingproduct', 'hostingproduct')
				->innerJoin('hostingproduct.hostaction', 'hostaction', 'WITH', "hostaction.alias = 'register' OR hostaction.alias = 'renew'")
				->orderBy('hostingplan.plan')
				->groupBy('hostingplan.id')
				->getQuery()
				->getResult()
		;
	}

	public function listHostingRegisterPrices()
	{
		return
			$this->getEntityManager()->createQueryBuilder()
				->select('hostingplan.id')
				->addSelect('hostingproduct.price')
				->from('AppBundle:Hostingplan', 'hostingplan')
				->innerJoin('hostingplan.hostingproduct', 'hostingproduct')
				->innerJoin('hostingproduct.hostaction', 'hostaction', 'WITH', "hostaction.alias = 'register' ")
				->getQuery()
				->getResult()
			;
	}
}