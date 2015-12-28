<?php


namespace AppBundle\Form\Frontend;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OrderType extends AbstractType
{
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
				'payment',
				'choice',
				[
					'choices' => ['1' => 'Paypal', '2' => 'Pago en efectivo'],
					'mapped' => false,
					'multiple' => false,
					'expanded' => true,
					'data' => '1',
					'label' => 'Metodo de pago'
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
