<?php


namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Domainproduct;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadDomainproductData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
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

        $a = 0;
        foreach($tdls as $tld) {
            $this->createDomainProducts($manager, $tld, $a+13, $a+13, $a+13, $a+180, $a+13);
        }
    }

    private function createDomainProducts(ObjectManager $manager, $extension, $registerPrice = 10, $renewPrice = 10, $redemptionPrice = 10, $transferPrice = 10, $changePrice = 10)
    {
        $domainProductRegister = new Domainproduct();
        $domainProductRegister->setProduct('product_domain');
        $domainProductRegister->setDomainaction($this->getReference('domain_action_register'));
        $domainProductRegister->setTld($this->getReference('tld_'.$extension));
        $domainProductRegister->setPrice($registerPrice);

        $manager->persist($domainProductRegister);

        $domainProductRenew = new Domainproduct();
        $domainProductRenew->setProduct('product_domain');
        $domainProductRenew->setDomainaction($this->getReference('domain_action_renew'));
        $domainProductRenew->setTld($this->getReference('tld_'.$extension));
        $domainProductRenew->setPrice($renewPrice);

        $manager->persist($domainProductRenew);

        $domainProductRedemption = new Domainproduct();
        $domainProductRedemption->setProduct('product_domain');
        $domainProductRedemption->setDomainaction($this->getReference('domain_action_redemption'));
        $domainProductRedemption->setTld($this->getReference('tld_'.$extension));
        $domainProductRedemption->setPrice($redemptionPrice);

        $manager->persist($domainProductRedemption);

        $domainProductTransferfrom = new Domainproduct();
        $domainProductTransferfrom->setProduct('product_domain');
        $domainProductTransferfrom->setDomainaction($this->getReference('domain_action_transferfrom'));
        $domainProductTransferfrom->setTld($this->getReference('tld_'.$extension));
        $domainProductTransferfrom->setPrice($transferPrice);

        $manager->persist($domainProductTransferfrom);

        $domainProductChange = new Domainproduct();
        $domainProductChange->setProduct('product_domain');
        $domainProductChange->setDomainaction($this->getReference('domain_action_change'));
        $domainProductChange->setTld($this->getReference('tld_'.$extension));
        $domainProductChange->setPrice($changePrice);

        $manager->persist($domainProductChange);

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