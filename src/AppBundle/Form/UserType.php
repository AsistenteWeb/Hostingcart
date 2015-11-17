<?php

namespace AppBundle\Form;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('email', 'text', array('required' => true, 'max_length' => '50'))
            ->add('plain_password', 'password', array('required' => false, 'max_length' => '50'))
            ->add('enabled', 'checkbox', array('label' => 'Habilitado', 'required' => false))

            ->add('firstName', 'text', array('required' => true, 'max_length' => '100'))
            ->add('lastName', 'text', array('required' => true, 'max_length' => '100'))
            ->add('company', 'text', array('required' => false, 'max_length' => '100'))
            ->add('country', 'country',
                array(
                    'required' => true,
                    'preferred_choices' => array('UY'),
                )
            )
            ->add('state', 'text', array('required' => true, 'max_length' => '50'))
            ->add('city', 'text', array('required' => true, 'max_length' => '100'))
            ->add('address1', 'text', array('required' => true, 'max_length' => '100'))
            ->add('address2', 'text', array('required' => false, 'max_length' => '100'))
            ->add('zipcode', 'text', array('required' => true, 'max_length' => '50'))
            ->add('phone', 'text', array('required' => true, 'max_length' => '50'))

        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Aw\UserBundle\Entity\User',
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'user_form';
    }
}
