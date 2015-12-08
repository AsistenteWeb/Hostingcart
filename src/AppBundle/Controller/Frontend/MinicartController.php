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

		return $this->render(
			'AwFrontendTemplateBundle:Cart:index.html.twig',
			[
				'form' => $form->createView()
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
