<?php

namespace AppBundle\DataFixtures\ORM;

use Aw\UserBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('es_UY');

        $admin = new User();
        $admin
            ->setFirstname('admin')
            ->setLastname('admin')
            ->setUsername('admin')
            ->setEmail('admin@admin.com')

            ->setPhonecc('00')
            ->setPhone($faker->phoneNumber)
            ->setAddress1($faker->address)
            ->setCity($faker->city)
            ->setCompany('N/A')
            ->setCountry($faker->countryCode)
            ->setState($faker->city)
            ->setZipcode($faker->postcode)

            ->addRole('ROLE_ADMINISTRATOR')
            ->setPlainPassword('1234')
            ->setEnabled(true)
        ;
        $manager->persist($admin);
        $manager->flush();

        for ($b = 0; $b <= 30; $b++) {
            $admin = new User();
            $admin
                ->setFirstname($faker->firstName)
                ->setLastname($faker->lastName)
                ->setUsername(strtolower($faker->userName))
                ->setEmail(strtolower($faker->email))

                ->setPhonecc('00')
                ->setPhone($faker->randomNumber(7))
                ->setAddress1($faker->address)
                ->setCity($faker->city)
                ->setCompany('N/A')
                ->setCountry($faker->countryCode)
                ->setState($faker->city)
                ->setZipcode($faker->postcode)

                ->addRole('ROLE_CLIENT')
                ->setPlainPassword('123456')
                ->setEnabled(true)
            ;
            $manager->persist($admin);
            $manager->flush();
        }

        $this->addReference('director', $admin);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
}
