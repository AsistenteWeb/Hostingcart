<?php

namespace AppBundle\Form\Corder;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\IsNull;
use Symfony\Component\Validator\Constraints\Null;

class CorderhostingType extends AbstractType
{
    private $actionHosting;

    public function __construct( $actionHosting ) {
        $this->actionHosting = $actionHosting;
    }


    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'hostingproduct',
                'entity',
                [
                    'class' => 'AppBundle\Entity\Hostingproduct',
                    'query_builder' => function (EntityRepository $er) {
                        return
                            $er->createQueryBuilder('hp')
                               ->innerJoin('hp.hostaction', 'ha', 'WITH',"ha.alias = :action")
                               ->setParameter('action', $this->actionHosting)
                            ;
                    },
                    'placeholder' => 'Sin Hosting',
                    'empty_data'  => null,
                    'required'    => false,
                    'label' => 'Hosting'
                ]
            )
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Corderhosting'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_corderhosting';
    }
}
