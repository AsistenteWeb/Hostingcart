<?php

namespace AppBundle\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
	public function indexAction()
	{
		return $this->render(
			'AwFrontendTemplateBundle::index.html.twig',
			[
				'hostingplans' => $this->getDoctrine()->getRepository('AppBundle:Hostingplan')->listPlans()
			]
		);
	}
}