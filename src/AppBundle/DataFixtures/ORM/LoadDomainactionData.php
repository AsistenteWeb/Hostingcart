<?php


namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Domainaction;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadDomainactionData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $actionRegister = new Domainaction();
        $actionRegister->setAlias('register');
        $actionRegister->setNameaction('Registrar');
        $manager->persist($actionRegister);

        $actionRenew = new Domainaction();
        $actionRenew->setAlias('renew');
        $actionRenew->setNameaction('Renovar');
        $manager->persist($actionRenew);

        $actionRedemption = new Domainaction();
        $actionRedemption->setAlias('redemption');
        $actionRedemption->setNameaction('Renovar en periodo de Redención');
        $manager->persist($actionRedemption);

        $actionTransferFrom = new Domainaction();
        $actionTransferFrom->setAlias('transfer_from');
        $actionTransferFrom->setNameaction('Transferir de otro Registrador');
        $manager->persist($actionTransferFrom);

        $actionChange = new Domainaction();
        $actionChange->setAlias('change');
        $actionChange->setNameaction('Cambiar datos');
        $manager->persist($actionChange);

        $manager->flush();

        $this->setReference('domain_action_register', $actionRegister);
        $this->setReference('domain_action_renew', $actionRenew);
        $this->setReference('domain_action_redemption', $actionRedemption);
        $this->setReference('domain_action_transferfrom', $actionTransferFrom);
        $this->setReference('domain_action_change', $actionChange);
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