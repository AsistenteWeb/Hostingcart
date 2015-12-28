<?php

namespace AppBundle\Controller\Frontend;

use AppBundle\Form\Frontend\OrderType;
use AppBundle\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MinicartController extends Controller
{
	public function checkuserAction()
	{

	}

	public function domainandhostingAction(Request $request, $id)
	{
		$orderType = new OrderType();

		$form = $this->createForm($orderType);

		$securityContext = $this->container->get('security.authorization_checker');

		if (!$securityContext->isGranted('IS_AUTHENTICATED_FULLY')) {
			//show logging form and register form
			$form
				->add('username', 'text')
				->add('password', 'password')
				->add('register_username', 'text')
				->add('register_password', 'password')
				->add('register_retype_password', 'password')

				->add('name', 'text', ['label' => 'Nombre:'])
				->add('company', 'text', ['label' => 'Empresa:'])
				->add('email', 'text', ['label' => 'Correo:'])
				->add('address_line_1', 'text', ['label' => 'Dirección 1:'])
				->add('address_line_2', 'text', ['label' => 'Dirección 2:'])
				->add('city', 'text', ['label' => 'Ciudad:'])
				->add('country', 'text', ['label' => 'País:'])
				->add('zipcode', 'text', ['label' => 'ZIP:'])
				->add('phone_cc', 'text', ['label' => '', 'data' => '' ])
				->add('phone', 'text', ['label' => 'Teléfono:'])
			;
			$logeado = 'undefined';
		}

		return $this->render(
			'AwFrontendTemplateBundle:Cart:index.html.twig',
			[
				'form' => $form->createView(),
				'logeado' => $logeado
			]
		);
/*
		return $this->render(
			'AppBundle:app:index.html.twig',
			[
				'formsCart' => $this->getFormCart($cart)->createView(),
				'formProducts' => $this->getFormProductsViews($this->getFormProducts($this->getDoctrine()->getManager()->getRepository('AppBundle:Product')->findAll())),
			]
		);
*/
	}
}
