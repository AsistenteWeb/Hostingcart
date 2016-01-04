<?php


namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Hostaction;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadHostingactionData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $actionRegister = new Hostaction();
        $actionRegister->setAlias('register');
        $actionRegister->setNameaction('Registrar');
        $manager->persist($actionRegister);

        $actionRenew = new Hostaction();
        $actionRenew->setAlias('renew');
        $actionRenew->setNameaction('Renovar');
        $manager->persist($actionRenew);

        $actionSuspend = new Hostaction();
        $actionSuspend->setAlias('suspend');
        $actionSuspend->setNameaction('Suspender Hosting');
        $manager->persist($actionSuspend);

        $actionTerminate = new Hostaction();
        $actionTerminate->setAlias('terminated');
        $actionTerminate->setNameaction('Remover el Hosting');
        $manager->persist($actionTerminate);

        $actionChange = new Hostaction();
        $actionChange->setAlias('change');
        $actionChange->setNameaction('Cambiar Datos');
        $manager->persist($actionChange);

        $manager->flush();

        $this->setReference('hosting_action_register', $actionRegister);
        $this->setReference('hosting_action_renew', $actionRenew);
        $this->setReference('hosting_action_suspend', $actionSuspend);
        $this->setReference('hosting_action_terminate', $actionTerminate);
        $this->setReference('hosting_action_change', $actionChange);
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