<?php

namespace AppBundle\Form\Backend\Tld;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TldType extends AbstractType
{
    private $register;
    private $renew;
    private $redemption;
    private $transferFrom;

    public function __construct( $register = null, $renew = null, $redemption = null, $transferFrom = null) {
        $this->register = $register;
        $this->renew    = $renew;
        $this->redemption = $redemption;
        $this->transferFrom = $transferFrom;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tld')
            ->add('enable')
            ->add('domainprovider')
            ->add('register', new DomainproductType(), ['mapped' => false, 'data' => $this->register])
            ->add('renew', new DomainproductType(), ['mapped' => false, 'data' => $this->renew])
            ->add('redemption', new DomainproductType(), ['mapped' => false, 'data' => $this->redemption])
            ->add('transfer_from', new DomainproductType(), ['mapped' => false, 'data' => $this->transferFrom])
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Tld',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_tld';
    }
}
