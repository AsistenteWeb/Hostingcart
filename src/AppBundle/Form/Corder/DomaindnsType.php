<?php

namespace AppBundle\Form\Corder;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DomaindnsType extends AbstractType
{
    private $dns;

    public function __construct($dns = null)
    {
        $this->dns = $dns;
    }
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dns', 'text', ['data' => $this->dns])
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Domaindns'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_domaindns';
    }
}
