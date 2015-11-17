<?php

namespace AppBundle\Entity;


use Doctrine\ORM\EntityRepository;

class DomainproductRepository extends EntityRepository
{
	public function getTldProductAsArray($tld, $action)
	{

		return $this->createQueryBuilder('domainproduct')
					->addSelect('tld')
		            ->innerJoin('domainproduct.tld', 'tld')
		            ->innerJoin('tld.domainprovider', 'domainprovider')
					->innerJoin('domainproduct.domainaction', 'domainaction')
		            ->where('tld.tld =:tld')
		            ->andWhere('domainaction.alias =:alias')
		            ->setParameter('tld', $tld)
		            ->setParameter('alias', $action)
		            ->getQuery()
		            ->getResult();
	}
}