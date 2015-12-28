<?php

namespace AppBundle\Form\Corder;

use Aw\UserBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DomaincontactType extends AbstractType
{
    private $user;

    public function __construct( User $user ) {
        $this->user = $user;
    }


    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', ['label' => 'Nombre:', 'data' => $this->user->getFirstname().' '.$this->user->getLastname() ])
            ->add('company', 'text', ['label' => 'Empresa:', 'data' => $this->user->getCompany() ])
            ->add('email', 'text', ['label' => 'Correo:', 'data' => $this->user->getEmail() ])
            ->add('address_line_1', 'text', ['label' => 'Dirección 1:', 'data' => $this->user->getAddress1()])
            ->add('address_line_2', 'text', ['label' => 'Dirección 2:', 'data' => $this->user->getAddress2() ])
            ->add('city', 'text', ['label' => 'Ciudad:', 'data' => $this->user->getCity() ])
            ->add('country', 'text', ['label' => 'País:', 'data' => $this->user->getCountry() ])
            ->add('zipcode', 'text', ['label' => 'ZIP:', 'data' => $this->user->getZipcode() ])
            ->add('phone_cc', 'text', ['label' => '', 'data' => '' ])
            ->add('phone', 'text', ['label' => 'Teléfono:', 'data' => $this->user->getPhone() ])
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Domaincontact'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_domaincontact';
    }
}
