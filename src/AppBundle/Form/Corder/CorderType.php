<?php

namespace AppBundle\Form\Corder;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CorderType extends AbstractType
{
    private $actionDomain;
    private $actionHosting;
    private $user;
    private $dnss;

    public function __construct($actionDomain, $actionHosting, $user, $dnss) {
        $this->actionDomain  = $actionDomain;
        $this->actionHosting = $actionHosting;
        $this->user = $user;
        $this->dnss = $dnss;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('corderhosting', new CorderhostingType($this->actionHosting))
            ->add(
                'register',
                'choice',
                [
                    'choices' => [  '1' => 'registrar', '2' => 'transferir', '' => 'No registrar'],
                    'mapped' => false,
                    'multiple' => false,
                    'expanded' => true,
                    'required' => false,
                    'data' => '1',
                    'label' => '¿con el dominio?'
                ]
            )
            ->add(
                'auto_code',
                'text',
                [
                    'mapped' => false,
                    'label' => 'Código de Autorización'
                ]
            )
            ->add(
                'domain',
                'text',
                [
                    'label' => 'Dominio',
                    'mapped' => false,
                ]
            )
            ->add(
                'create_host',
                'checkbox',
                [
                    'label' => 'Crear la cuenta en el servidor de hosting',
                    'data' => true,
                    'required' => false,
                    'mapped' => false
                ]
            )
            ->add(
                'hosting_mail',
                'checkbox',
                [
                    'label' => 'Enviar correo con los datos del hosting',
                    'data' => true,
                    'required' => false,
                    'mapped' => false
                ]
            )
            ->add(
                'register_domain',
                'checkbox',
                [
                    'label' => 'Registrar el dominio',
                    'data' => true,
                    'required' => false,
                    'mapped' => false
                ]
            )
            ->add(
                'contact_register',
                new DomaincontactType($this->user),
                [
                    'mapped' => false
                ]
            )
            ->add(
                'contact_administrator',
                new DomaincontactType($this->user),
                [
                    'mapped' => false
                ]
            )
            ->add(
                'contact_billing',
                new DomaincontactType($this->user),
                [
                    'mapped' => false
                ]
            )
            ->add(
                'contact_technical',
                new DomaincontactType($this->user),
                [
                    'mapped' => false
                ]
            )
            ->add(
                'dns1',
                new DomaindnsType(isset($this->dnss[0]) ? $this->dnss[0] : null),
                [
                    'mapped' => false
                ]
            )
            ->add(
                'dns2',
                new DomaindnsType(isset($this->dnss[1]) ? $this->dnss[1] : null),
                [
                    'mapped' => false
                ]
            )
            ->add(
                'dns3',
                new DomaindnsType(isset($this->dnss[2]) ? $this->dnss[2] : null),
                [
                    'mapped' => false
                ]
            )
            ->add(
                'dns4',
                new DomaindnsType(isset($this->dnss[3]) ? $this->dnss[3] : null),
                [
                    'mapped' => false
                ]
            )
            ->add(
                'dns5',
                new DomaindnsType(isset($this->dnss[4]) ? $this->dnss[4] : null),
                [
                    'mapped' => false
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
            'data_class' => 'AppBundle\Entity\Corder'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_corder';
    }
}
