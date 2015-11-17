<?php

namespace AppBundle\Controller\Backend;

use AppBundle\Entity\Domainproduct;
use AppBundle\Entity\Product;
use AppBundle\Entity\Tld;
use AppBundle\Form\Backend\Tld\TldType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class TldController extends Controller
{
	public function indexAction()
	{
		return $this->render('AwBackendTemplateBundle:Tld:index.html.twig',
			[
				'tlds' => $this->getDoctrine()->getManager()->getRepository('AppBundle:Tld')->listPlans(),
			]
		);
	}

	public function newAction()
	{
		$form = $this->createCreateForm($tld = new Tld());

		return $this->render('AwBackendTemplateBundle:Tld:new.html.twig',
			[
				'form'   => $form->createView(),
				'entity' => $tld,
			]

		);
	}

	public function createAction(Request $request)
	{
		$form = $this->createCreateForm($tld = new Tld());
		$form->handleRequest($request);

		if ($form->isValid()) {
			$tld = $this->addDomainManyProducts(
				$tld,
				[
					'register' => $form->get('register')->getData()->getPrice(),
					'renew' => $form->get('renew')->getData()->getPrice(),
					'redemption' => $form->get('redemption')->getData()->getPrice(),
					'transfer_from' => $form->get('transfer_from')->getData()->getPrice(),
					'change' => 0
				]
			)
			;
			$em = $this->getDoctrine()->getManager();
			$em->persist($tld);
			$em->flush();

			return $this->redirect($this->generateUrl('tld'));
		}

		return $this->render('AwBackendTemplateBundle:Tld:new.html.twig', array(
			'entity' => $tld,
			'form'   => $form->createView(),
		));
	}

	public function editAction($id)
	{
		if (!($tld = $this->getDoctrine()->getRepository('AppBundle:Tld')->find($id))) {
			throw $this->createNotFoundException('No se encuentra el dominio.');
		}

		$editForm = $this->createEditForm($tld);

		return $this->render('AwBackendTemplateBundle:Tld:edit.html.twig', array(
			'entity' => $tld,
			'form' => $editForm->createView(),
		));
	}

	public function updateAction(Request $request, $id)
	{
		$em = $this->getDoctrine()->getManager();

		if (!($tld = $em->getRepository('AppBundle:Tld')->find($id))) {
			throw $this->createNotFoundException('El dominio no existe.');
		}

		$editForm = $this->createEditForm($tld);
		$editForm->handleRequest($request);

		if ($editForm->isValid()) {

			$em->flush();

			return $this->redirect($this->generateUrl('tld'));
		}


		return $this->render('AwBackendTemplateBundle:Tld:edit.html.twig', array(
			'entity'      => $tld,
			'edit_form'   => $editForm->createView(),
		));
	}

	private function createEditForm(Tld $tld)
	{
		foreach (['register', 'renew', 'redemption', 'transfer_from'] as $action) {
			$products[$action] = $this->getTldProduct($tld, $action);
		}
		$form = $this->createForm(
			new TldType($products['register'], $products['renew'], $products['redemption'], $products['transfer_from']),
			$tld,
			[
				'action' => $this->generateUrl('tld_update', array('id' => $tld->getId())),
				'method' => 'PUT'
			]
		);

		$form->add('submit', 'submit', array('label' => 'Actualizar'));
		return $form;
	}

	private function getTldProduct($tld, $action)
	{
		$em = $this->getDoctrine()->getManager();

		return $em->getRepository('AppBundle:Domainproduct')->findBy(
				[
					'tld' => $tld,
					'domainaction' => $em->getRepository('AppBundle:Domainaction')->findOneBy(['alias' => $action])
				]
			)[0];
	}


	private function createCreateForm(Tld $tld)
	{
		$form = $this->createForm(
			new TldType(),
			$tld,
			array(
				'action' => $this->generateUrl('tld_create'),
				'method' => 'POST',
			)
		);

		$form->add('submit', 'submit', array('label' => 'Ofrecer dominio'));

		return $form;
	}

	private function addDomainManyProducts(Tld $tld, $prices)
	{
		$product = $this->getDoctrine()->getRepository('AppBundle:Product')->findOneBy(['name' => 'domain']);
		foreach ($prices as $action => $price) {
			$tld->addDomainproduct(
				$this->createDomainProduct($product, $tld, $action, $price)
			);
		}
		return $tld;
	}

	private function createDomainProduct(Product $product, Tld $tld, $productString, $price = 0)
	{
		if (!$this->getDoctrine()->getRepository('AppBundle:Domainaction')->findOneBy(['alias' => $productString])) {
			throw new \Exception($productString." action doesn't exist");
		}
		$domainProduct = new Domainproduct();
		$domainProduct
			->setProduct($product)
			->setDomainaction($this->getDoctrine()->getRepository('AppBundle:Domainaction')->findOneBy(['alias' => $productString]))
			->setTld($tld)
			->setPrice($price)
		;
		return $domainProduct;
	}
}
