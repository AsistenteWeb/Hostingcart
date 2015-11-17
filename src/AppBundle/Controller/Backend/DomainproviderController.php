<?php

namespace AppBundle\Controller\Backend;

use AppBundle\Entity\Domainprovider;
use AppBundle\Form\Backend\Domain\DomainproviderType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DomainproviderController extends Controller {
	public function indexAction() {
		return $this->render( 'AwBackendTemplateBundle:Domainprovider:index.html.twig', array(
			'providers' => $this->getDoctrine()->getManager()->getRepository( 'AppBundle:Domainprovider' )->findAll(),
		) );
	}

	public function newAction() {
		return $this->render( 'AwBackendTemplateBundle:Domainprovider:new.html.twig', array(
			'form'            => $this->createCreateForm( $domainProvider = new Domainprovider() )->createView(),
			'domain_provider' => $domainProvider,
		) );
	}

	private function createCreateForm( Domainprovider $domainProvider ) {
		return
			$this->createForm(
				new DomainproviderType(),
				$domainProvider,
				array(
					'action' => $this->generateUrl( 'domainprovider_create' ),
					'method' => 'POST',
				)
			)
				->add( 'submit', 'submit', array( 'label' => 'Crear Proveedor de Dominio' ) );
	}

	public function createAction( Request $request ) {
		$form = $this->createCreateForm( $domainProvider = new Domainprovider());
		$form->handleRequest( $request );

		if ( $form->isValid() ) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($domainProvider);
			$em->flush();

			return $this->redirect($this->generateUrl('domainprovider'));
		}

		return $this->render( 'AwBackendTemplateBundle:Domainprovider:new.html.twig', array(
			'form'            => $form->createView(),
			'domain_provider' => $domainProvider,
		) );
	}

	public function editAction($id)
	{
		if (!($domainProvider = $this->getDoctrine()->getManager()->getRepository('AppBundle:Domainprovider')->findOneBy(['id' => $id]))) {
			throw $this->createNotFoundException('No se encuentra el hosting.');
		}

		$editForm = $this->createEditForm($domainProvider);

		return $this->render('AwBackendTemplateBundle:Domainprovider:edit.html.twig', array(
			'domain_provider' => $domainProvider,
			'form' => $editForm->createView(),
		));
	}

	public function updateAction(Request $request, $id)
	{
		$em = $this->getDoctrine()->getManager();

		if (!($domainprovider = $em->getRepository('AppBundle:Domainprovider')->find($id))) {
			throw $this->createNotFoundException('El proveedor de dominio no existe.');
		}

		$editForm = $this->createEditForm($domainprovider);
		$editForm->handleRequest($request);

		if ($editForm->isValid()) {
			$em->persist($domainprovider);
			$em->flush();

			return $this->redirect($this->generateUrl('domainprovider'));
		}

		return $this->render('AwBackendTemplateBundle:Hostingplan:edit.html.twig', array(
			'entity' => $domainprovider,
			'form' => $editForm->createView(),
		));
	}

	private function createEditForm(Domainprovider $domainprovider)
	{
		$form = $this->createForm(
			new DomainproviderType(),
			$domainprovider,
			array(
				'action' => $this->generateUrl('domainprovider_update', array('id' => $domainprovider->getId())),
				'method' => 'PUT',
			)
		);
		$form->add('submit', 'submit', array('label' => 'Actualizar'));
		return $form;
	}
}