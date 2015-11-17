<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Tld;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadTldData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $tdls = array(
            'com' => 'com',
            'org' => 'org',
            'net' => 'net',
            'com.pe' => 'com.pe',
            'com.uy' => 'com.uy',
            'pe' => 'pe',
            'uy' => 'uy',
        );

        foreach($tdls as $tld) {
            $domain = new Tld();
            $domain->setTld($tld);
            $domain->setEnable(true);
            $domain->setDomainprovider($this->getReference('domainprovider'));

            $manager->persist($domain);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}
