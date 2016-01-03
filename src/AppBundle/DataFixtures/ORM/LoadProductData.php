<?php


namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Product;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadProductData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $hosting = new Product();
        $hosting->setName('hosting');
        $manager->persist($hosting);

        $dominio = new Product();
        $dominio->setName('domain');
        $manager->persist($dominio);

        $manager->flush();

        $this->setReference('product_hosting', $hosting);
        $this->setReference('product_domain', $dominio);
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