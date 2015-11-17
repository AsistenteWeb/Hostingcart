<?php


namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Domaincontacttype;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadDomaincontacttypeData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $register = new Domaincontacttype();
        $register->setName('register');

        $manager->persist($register);

        $administrative = new Domaincontacttype();
        $administrative->setName('administrative');

        $manager->persist($administrative);

        $billing = new Domaincontacttype();
        $billing->setName('billing');

        $manager->persist($billing);

        $technical = new Domaincontacttype();
        $technical->setName('technical');

        $manager->persist($technical);

        $manager->flush();
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