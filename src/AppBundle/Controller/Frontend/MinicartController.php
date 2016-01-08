<?php

namespace AppBundle\Controller\Frontend;

use AppBundle\Form\Frontend\OrderType;
use AppBundle\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;

class MinicartController extends Controller
{
	public function checkuserAction()
	{

	}

	public function proccessdomainandhostingAction(Request $request)
	{
		$form = $this->createForm(new OrderType());
		$securityContext = $this->container->get('security.authorization_checker');

		if (!$securityContext->isGranted('IS_AUTHENTICATED_FULLY')) {
			$form = $this->getForm($form);
		}

		$form->handleRequest($request);

		if ($form->isValid()) {

			if ($form->get('register')->getData() == 1 || $form->get('register')->getData() == 2) {

				if ($form->get('register')->getData() == 1) {
					try {
						$this->get('app.domain')->checkDomain($form->get('custom_domain')->getData().'.'.$form->get('tld')->getData());
					} catch(\Exception $e) {
						$form->get('custom_domain')->addError(new FormError($e->getMessage()));
dump($form->get('custom_domain'));
					}
				}

				if ($form->get('register')->getData() == 2) {

				}

			} else {
				$form->get('register')->addError(new FormError('Debe seleccionar una opcion'));
			}

			if ($form->get('payment')->getData() == 1 || $form->get('payment')->getData() == 2) {

			} else {
				$form->get('payment')->addError(new FormError('Debe seleccionar un metodo de pago'));
			}

			if ($form->get('clientregister')->getData() == 1 || $form->get('clientregister')->getData() == 2) {

			} else {
				$form->get('clientregister')->addError(new FormError('Debe seleccionar una accion'));
			}
		}

		return $this->render(
			'AwFrontendTemplateBundle:Cart:index.html.twig',
			[
				'form' => $form->createView(),
				'domain_prices' => json_encode($this->getDoctrine()->getRepository('AppBundle:Tld')->listTldRegisterPrices()),
				'hosting_prices' => json_encode($this->getDoctrine()->getRepository('AppBundle:Hostingplan')->listHostingRegisterPrices())
			]
		);
	}

	public function domainandhostingAction(Request $request, $id)
	{
		$form = $this->createForm(new OrderType());
		$securityContext = $this->container->get('security.authorization_checker');

		if (!$securityContext->isGranted('IS_AUTHENTICATED_FULLY')) {
			$form = $this->getForm($form);
		}

		return $this->render(
			'AwFrontendTemplateBundle:Cart:index.html.twig',
			[
				'form' => $form->createView(),
				'domain_prices' => json_encode($this->getDoctrine()->getRepository('AppBundle:Tld')->listTldRegisterPrices()),
				'hosting_prices' => json_encode($this->getDoctrine()->getRepository('AppBundle:Hostingplan')->listHostingRegisterPrices())
			]
		);
	}

	public function getForm($form)
	{
		return
			$form
				->add('username', 'text', ['label' => 'Usuario:'])
				->add('password', 'password', ['label' => 'Contraseña:'])
				->add('register_username', 'text', ['label' => 'Usuario:'])
				->add('register_password', 'password', ['label' => 'Contraseña:'])
				->add('register_retype_password', 'password', ['label' => 'Escriba nuevamente la contraseña:'])

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
	}
}
