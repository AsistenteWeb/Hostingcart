<?php


namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Hostingplan;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadHostingplanData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $basicHosting = new Hostingplan();
        $basicHosting->setPlan('Basico');
        $basicHosting->setAlias('basico');
        $basicHosting->setDisksize('200');
        $basicHosting->setBandwidth('3000');
        $basicHosting->setDescription('Hosting Básico');

        $manager->persist($basicHosting);

        $estandarHosting = new Hostingplan();
        $estandarHosting->setPlan('Estandar');
        $estandarHosting->setAlias('estandar');
        $estandarHosting->setDisksize('500');
        $estandarHosting->setBandwidth('5000');
        $estandarHosting->setDescription('Hosting Estandar');

        $manager->persist($estandarHosting);

        $manager->flush();

        $this->setReference('hosting_plan_basichosting', $basicHosting);
        $this->setReference('hosting_plan_estandarhosting', $estandarHosting);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }

}