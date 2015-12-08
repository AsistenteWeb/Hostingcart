<?php

namespace AppBundle\Services;

use AppBundle\Entity\Corder;
use AppBundle\Entity\Corderdomain;
use AppBundle\Form\Corder\CorderType;
use Doctrine\ORM\EntityManager;
use FOS\UserBundle\Model\User;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class OrderManager
{
	private $em;
	private $formFactory;
	private $router;

	public function __construct(EntityManager $em, FormFactory $formFactory, Router $router )
	{
		$this->em          = $em;
		$this->formFactory = $formFactory;
		$this->router      = $router;
	}

	public function createOrder(User $user)
	{
		$corder = new Corder();
		$corder->setUser($user);
		$corder->setCorderdomain(new Corderdomain());

		return $corder;
	}

	/**
	 * @param $order
	 * @param $user
	 *
	 * @return $this|\Symfony\Component\Form\FormInterface
	 */
	public function createForm($order, $user)
	{
		return
			$this->formFactory->create(
				new CorderType(
					'register',
					'register',
					$user,
					$this->em->getRepository('AppBundle:Dnsdefault')->findAll()
				),
				$order,
				[
					'action' => $this->router->generate('backend_user_corder_create', ['id' => $user->getId()]),
					'method' => 'POST'
				]
			)
			->add(
				'register_domain_action',
				'submit',
				[
					'label' => 'Registrar dominio',
					'attr' =>
						[
							'class' => 'btn-primary btn-xs'
						]
				]
			)
			->add(
				'register_domain_and_pay_action',
				'submit',
				[
					'label' => 'Registrar dominio y pagar',
					'attr' =>
						[
							'class' => 'btn-warning btn-xs'
						]
				]
			)
			->add(
				'register_hosting_action',
				'submit',
				[
					'label' => 'Registrar hosting',
					'attr' =>
						[
							'class' => 'btn-primary btn-xs'
						]
				]
			)
			->add(
				'register_hosting_and_pay_action',
				'submit',
				[
					'label' => 'Registrar hosting y pagar',
					'attr' =>
						[
							'class' => 'btn-warning btn-xs'
						]
				]
			)
			->add(
				'register_domain_and_hosting_action',
				'submit',
				[
					'label' => 'Registrar dominio y hosting',
					'attr' =>
						[
							'class' => 'btn-primary btn-xs'
						]
				]
			)
			->add(
				'register_domain_and_hosting_and_pay_action',
				'submit',
				[
					'label' => 'Registrar dominio y hosting y pagar',
					'attr' =>
						[
							'class' => 'btn-warning btn-xs'
						]
				]
			)
		;
	}
}
