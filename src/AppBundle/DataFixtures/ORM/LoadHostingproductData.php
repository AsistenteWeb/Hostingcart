<?php


namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Hostingproduct;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadHostingproductData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $registerhostingProductBasico = new Hostingproduct();
        $registerhostingProductBasico->setHostaction($this->getReference('hosting_action_register'));
        $registerhostingProductBasico->setHostingplan($this->getReference('hosting_plan_basichosting'));
        $registerhostingProductBasico->setProduct($this->getReference('product_hosting'));
        $registerhostingProductBasico->setPrice('28.00');

        $manager->persist($registerhostingProductBasico);

        $renewhostingProductBasico = new Hostingproduct();
        $renewhostingProductBasico->setHostaction($this->getReference('hosting_action_renew'));
        $renewhostingProductBasico->setHostingplan($this->getReference('hosting_plan_basichosting'));
        $renewhostingProductBasico->setProduct($this->getReference('product_hosting'));
        $renewhostingProductBasico->setPrice('28.00');

        $manager->persist($renewhostingProductBasico);

        $suspendhostingProductBasico = new Hostingproduct();
        $suspendhostingProductBasico->setHostaction($this->getReference('hosting_action_suspend'));
        $suspendhostingProductBasico->setHostingplan($this->getReference('hosting_plan_basichosting'));
        $suspendhostingProductBasico->setProduct($this->getReference('product_hosting'));
        $suspendhostingProductBasico->setPrice('0.00');

        $manager->persist($suspendhostingProductBasico);

        $terminatehostingProductBasico = new Hostingproduct();
        $terminatehostingProductBasico->setHostaction($this->getReference('hosting_action_terminate'));
        $terminatehostingProductBasico->setHostingplan($this->getReference('hosting_plan_basichosting'));
        $terminatehostingProductBasico->setProduct($this->getReference('product_hosting'));
        $terminatehostingProductBasico->setPrice('0.00');

        $manager->persist($terminatehostingProductBasico);

        $changehostingProductBasico = new Hostingproduct();
        $changehostingProductBasico->setHostaction($this->getReference('hosting_action_change'));
        $changehostingProductBasico->setHostingplan($this->getReference('hosting_plan_basichosting'));
        $changehostingProductBasico->setProduct($this->getReference('product_hosting'));
        $changehostingProductBasico->setPrice('0.00');

        $manager->persist($changehostingProductBasico);

        $manager->flush();

        $registerhostingProductEstandar = new Hostingproduct();
        $registerhostingProductEstandar->setHostaction($this->getReference('hosting_action_register'));
        $registerhostingProductEstandar->setHostingplan($this->getReference('hosting_plan_estandarhosting'));
        $registerhostingProductEstandar->setProduct($this->getReference('product_hosting'));
        $registerhostingProductEstandar->setPrice('48.00');

        $manager->persist($registerhostingProductEstandar);

        $renewhostingProductEstandar = new Hostingproduct();
        $renewhostingProductEstandar->setHostaction($this->getReference('hosting_action_renew'));
        $renewhostingProductEstandar->setHostingplan($this->getReference('hosting_plan_estandarhosting'));
        $renewhostingProductEstandar->setProduct($this->getReference('product_hosting'));
        $renewhostingProductEstandar->setPrice('48.00');

        $manager->persist($renewhostingProductEstandar);

        $suspendhostingProductEstandar = new Hostingproduct();
        $suspendhostingProductEstandar->setHostaction($this->getReference('hosting_action_suspend'));
        $suspendhostingProductEstandar->setHostingplan($this->getReference('hosting_plan_estandarhosting'));
        $suspendhostingProductEstandar->setProduct($this->getReference('product_hosting'));
        $suspendhostingProductEstandar->setPrice('0.00');

        $manager->persist($suspendhostingProductEstandar);

        $terminatehostingProductEstandar = new Hostingproduct();
        $terminatehostingProductEstandar->setHostaction($this->getReference('hosting_action_terminate'));
        $terminatehostingProductEstandar->setHostingplan($this->getReference('hosting_plan_estandarhosting'));
        $terminatehostingProductEstandar->setProduct($this->getReference('product_hosting'));
        $terminatehostingProductEstandar->setPrice('0.00');

        $manager->persist($terminatehostingProductEstandar);

        $changehostingProductEstandar = new Hostingproduct();
        $changehostingProductEstandar->setHostaction($this->getReference('hosting_action_change'));
        $changehostingProductEstandar->setHostingplan($this->getReference('hosting_plan_estandarhosting'));
        $changehostingProductEstandar->setProduct($this->getReference('product_hosting'));
        $changehostingProductEstandar->setPrice('0.00');

        $manager->persist($changehostingProductEstandar);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 3;
    }
}