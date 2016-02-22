<?php


namespace AppBundle\Form\Frontend;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OrderType extends AbstractType
{
	private $doctrine;
	private $defaultPaymentMethod;

	public function __construct(Registry $doctrine, $defaultPaymentMethod = 'Paypal')
	{
		$this->doctrine = $doctrine;
		$this->defaultPaymentMethod = $this->doctrine->getRepository('AppBundle:Paymentmethod')->findOneBy(['name'=>$defaultPaymentMethod]);
	}

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add(
				'register',
				'choice',
				[
					'choices' => ['1' => 'Registrar un dominio', '2' => 'Ya poseo mi propio dominio'],
					'mapped' => false,
					'multiple' => false,
					'expanded' => true,
					'data' => '1',
					'label' => '¿con el dominio?'
				]
			)
			->add(
				'own_domain',
				'text'
			)
			->add(
				'custom_domain',
				'text'
			)
			->add(
				'tld',
				'entity',
				[
					'class' => 'AppBundle:Tld',
					'attr' =>
						[
							'class' => 'css-checkbox'
						]
				]
			)
			->add(
				'hostingplan',
				'entity',
				[
					'class' => 'AppBundle:Hostingplan'
				]
			)

			->add(
				'paymentmethod',
				'entity',
				[
					'class' => 'AppBundle:Paymentmethod',
					'data_class' => 'AppBundle\Entity\Paymentmethod',
					'expanded' => true,
					'data' => $this->defaultPaymentMethod
				]
			)

			->add(
				'clientregister',
				'choice',
				[
					'choices' => ['1' => 'Ya soy cliente', '2' => 'Aun no tengo una cuenta de cliente'],
					'mapped' => false,
					'multiple' => false,
					'expanded' => true,
					'data' => '1',
					'label' => 'cliente'
				]
			)
		;
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
	}

	public function getName()
	{
		return 'frontend_order';
	}
}
