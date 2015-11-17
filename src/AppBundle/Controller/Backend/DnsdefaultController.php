<?php

namespace AppBundle\Controller\Backend;

use AppBundle\Entity\Dnsdefault;
use AppBundle\Form\DnsdefaultType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DnsdefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render(
            'AwBackendTemplateBundle:Dnsdefault:index.html.twig',
            [
                'dnss' => $this->getDoctrine()->getManager()->getRepository('AppBundle:Dnsdefault')->findAll()
            ]
        );
    }

    public function newAction()
    {
        $form = $this->createCreateForm($dns = new Dnsdefault());

        return $this->render('AwBackendTemplateBundle:Dnsdefault:new.html.twig', array(
            'form'   => $form->createView(),
            'entity' => $dns,
        ));
    }

    public function createAction(Request $request)
    {
        $form = $this->createCreateForm($dns = new Dnsdefault());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($dns);
            $em->flush();

            return $this->redirect($this->generateUrl('dnsdefault'));
        }

        return $this->render('AwBackendTemplateBundle:Dnsdefault:new.html.twig',
            [
                'entity' => $dns,
                'form'   => $form->createView(),
            ]
        );
    }

    public function editAction($id)
    {
        if (!($dns = $this->getDoctrine()->getManager()->getRepository('AppBundle:Dnsdefault')->find($id))) {
            throw $this->createNotFoundException('No se encuentra el dns.');
        }

        return $this->render('AwBackendTemplateBundle:Dnsdefault:edit.html.twig',
            [
                'entity' => $dns,
                'form' => $this->createEditForm($dns)->createView(),
                'deleteForm' => $this->createDeleteForm($dns->getId())->createView(),
            ]
        );
    }


    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        if (!($dns = $em->getRepository('AppBundle:Dnsdefault')->find($id))) {
            throw $this->createNotFoundException('En DNS no existe.');
        }

        $editForm = $this->createEditForm($dns);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('dnsdefault'));
        }

        return $this->render('AwBackendTemplateBundle:Dnsdefault:edit.html.twig', array(
            'entity'      => $dns,
            'edit_form'   => $editForm->createView(),
        ));
    }

    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Dnsdefault')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('No se puede encontrar DNS.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('dnsdefault'));
    }

    private function createEditForm(Dnsdefault $dnsdefault)
    {
        $form = $this->createForm(
            new DnsdefaultType(),
            $dnsdefault,
            array(
                'action' => $this->generateUrl('dnsdefault_update', ['id' => $dnsdefault->getId()]),
                'method' => 'POST',
            )
        );

        $form->add('submit', 'submit', array('label' => 'Actualizar DNS'));

        return $form;
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('dnsdefault_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar DNS por defecto'))
            ->getForm()
        ;
    }

    private function createCreateForm(Dnsdefault $dnsdefault)
    {
        $form = $this->createForm(
            new DnsdefaultType(),
            $dnsdefault,
            array(
                'action' => $this->generateUrl('dnsdefault_create'),
                'method' => 'POST',
            )
        );

        $form->add('submit', 'submit', array('label' => 'Crear DNS por defecto'));

        return $form;
    }
}
