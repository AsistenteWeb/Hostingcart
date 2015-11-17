<?php

namespace AppBundle\Form\Backend\Hosting;

use AppBundle\Entity\Hostingplan;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HostingplanType extends AbstractType
{
    private $register;
    private $renew;

    function __construct( $register = null, $renew = null) {
        $this->register = $register;
        $this->renew    = $renew;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('plan', 'text', ['label' => 'Plan:'])
            ->add('alias', 'text', ['label' => 'Cpanel Plan:'])
            ->add('description', 'textarea', ['label' => 'Descripción:', 'required' => false])
            ->add('disksize')
            ->add('bandwidth')
            ->add('register', new HostingproductType(), ['mapped' => false, 'data' => $this->register])
            ->add('renew', new HostingproductType(), ['mapped' => false, 'data' => $this->renew])
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Hostingplan',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_hostingplan';
    }
}
